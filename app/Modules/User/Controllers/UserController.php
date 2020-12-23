<?php

namespace App\Modules\User\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\RBAC\Models\Permission;
use App\Modules\RBAC\Models\Role;
use App\Modules\User\Models\User;
use App\Modules\User\Requests\UserRequest;
use Illuminate\Http\Request;
use UserService;

class UserController extends Controller
{
    public function index ()
    {
        if (!auth()->user()->can('INDEX_USER')) {
            return view('403');
        }

        $users = UserService::all();
        $this->view('user::index');

        return $this->render(compact('users'));
    }

    public function create ()
    {
        if (!auth()->user()->can('CREATE_USER')) {
            return view('403');
        }
        $roles = Role::all();
        $this->view('user::create');

        return $this->render(compact('roles'));
    }

    public function store (UserRequest $request)
    {
        if (!auth()->user()->can('CREATE_USER')) {
            return view('403');
        }

        $result = UserService::create($request);

        if (is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect()->route('users')->with($result);
    }

    public function edit (User $user)
    {
        if (!auth()->user()->can('UPDATE_USER')) {
            return view('403');
        }

        $roles = Role::all();
        $role_id = $user->roles->pluck('id')->toArray();
        $user->role_id = $role_id[0];
        $this->view('user::edit');

        return $this->render(compact('roles', 'user'));
    }

    public function update (UserRequest $request, User $user)
    {
        if (!auth()->user()->can('UPDATE_USER')) {
            return view('403');
        }

        $result = UserService::update($request, $user);

        if (is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect()->route('users')->with($result);
    }

    public function delete (User $user)
    {
        if (!auth()->user()->can('DELETE_USER')) {
            return view('403');
        }
        $result = UserService::destroy($user);

        if (is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect()->route('users')->with($result);
    }

    public function permissions ()
    {
        if (!auth()->user()->can('CHANGE_PERMISSIONS')) {
            return view('403');
        }

        $permissions = Permission::all();
        $roles = Role::all();

        $this->view('user::permission');

        return $this->render(compact('permissions', 'roles'));
    }

    public function savePermissions (Request $request)
    {
        if (!auth()->user()->can('CHANGE_PERMISSIONS')) {
            return view('403');
        }

        return UserService::savePermissions($request);
    }
}
