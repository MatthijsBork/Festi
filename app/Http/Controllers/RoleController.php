<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

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
}
