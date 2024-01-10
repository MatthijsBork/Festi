<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\UserStoreRequest;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
    public function create()
    {
        $roles = Role::orderBy('name')->get();
        return view('dashboard.users.create', compact('roles'));
    }

    public function edit(User $user)
    {
        $roles = Role::orderBy('name')->get();
        return view('dashboard.users.edit', compact('user', 'roles'));
    }

    public function store(UserStoreRequest $request): RedirectResponse
    {
        if ($request->input('admin')) {
            $admin = true;
        } else {
            $admin = false;
        }

        $user = User::create([
            'name' => Str::ucfirst($request->name),
            'email' => $request->email,
            'telephone' => $request->telephone,
            'address' => $request->address,
            'postal_code' => $request->postal,
            'city' => Str::ucfirst($request->city),
            'role' => $request->role_id ?? null,
            'password' => Hash::make($request->password),
            'is_admin' => $admin,
        ]);

        $user->save();

        return redirect()->route('dashboard.users', [$user])->with('success', 'Gebruiker toegevoegd');
    }

    public function update(UserUpdateRequest $request, User $user): RedirectResponse
    {
        $user->name = Str::ucfirst($request->name);
        $user->email = $request->email;
        $user->role_id = $request->role;
        $user->telephone = $request->telephone;
        $user->address = $request->address;
        $user->postal_code = $request->postal;
        $user->city = Str::ucfirst($request->city);
        $user->password = $request->filled('password') ?  Hash::make($request->password) : $user->password;
        $user->is_admin = $request->admin ?? 0;
        $user->save();

        return redirect()->route('dashboard.users', [$user])->with('success', 'Gebruiker opgeslagen');
    }

    public function dashboard(Request $request)
    {
        $query = $request->input('query');
        $users = User::where('name', 'like', "%$query%")->orderBy('name', 'asc')->paginate(10);
        return view('dashboard.users.index', compact('users'));
    }

    public function delete(User $user)
    {
        $user->delete();
        return redirect()->route('dashboard.users')->with('success', 'Gebruiker verwijderd');
    }
}
