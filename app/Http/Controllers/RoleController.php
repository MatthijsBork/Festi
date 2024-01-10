<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\RoleStoreRequest;
use App\Http\Requests\RoleUpdateRequest;

class RoleController extends Controller
{
    public function dashboard(Request $request)
    {
        $query = $request->input('query');
        $roles = Role::where('name', 'like', "%$query%")
            ->orderBy('name')->paginate(10);
        return view('dashboard.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('dashboard.roles.create');
    }

    public function store(RoleStoreRequest $request)
    {
        $role = new Role();
        $role->name = $request->name;
        $role->save();

        return redirect()->route('dashboard.roles')->with('success', 'Rol toegevoegd!');
    }

    public function update(RoleUpdateRequest $request, Role $role)
    {
        $role->name = $request->name;
        $role->save();

        return redirect()->route('dashboard.roles')->with('success', 'Rol aangepast!');
    }

    public function delete(Role $role)
    {
        $role->delete();

        return redirect()->route('dashboard.roles')->with('success', 'Rol verwijderd!');
    }
}
