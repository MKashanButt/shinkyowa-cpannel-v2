<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::withCount('customerAccount', 'payment', 'agentManager')
            ->with('role')
            ->when(Auth::user()->hasPermission('view_team_members'), function ($query) {
                $managerAgentIds = User::where('manager_id', Auth::id())
                    ->where('role', 'agent')
                    ->pluck('id');
                $query->whereIn('id', $managerAgentIds);
            })
            ->orderBy('id', 'DESC')
            ->paginate(8);

        return view('user.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::pluck('name', 'id');
        $managers = User::whereHas('role', function ($q) {
            $q->where('name', 'manager');
        })->pluck('name', 'id');

        return view('user.create', compact('roles', 'managers'));
    }

    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = bcrypt($validated['password']);

        User::create($validated);

        return redirect()->route('user.index')->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        $roles = Role::pluck('name', 'id');
        $managers = User::whereHas('role', function ($q) {
            $q->where('name', 'manager');
        })->pluck('name', 'id');

        return view('user.edit', compact('user', 'roles', 'managers'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $validated = $request->validated();
        if (isset($validated['password'])) {
            $validated['password'] = bcrypt($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        return redirect()->route('user.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User deleted successfully.');
    }
}
