<?php

namespace App\Modules\User\Services;

use App\Modules\RBAC\Models\Role;
use App\Modules\User\Models\User;
use App\Modules\User\Requests\UserRequest;
use Illuminate\Http\Request;

class UserService
{
    public function all()
    {
        $books = User::all();

        return $books;
    }

    public function create (UserRequest $request)
    {
        $data = $request->except('_token', 'role_id');
        $role = $request->input('role_id');
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        if ($user) {
            $user->attachRole($role);
            return ['status' => __('main.user_added')];
        } else {
            return ['error' => __('main.save_error')];
        }
    }

    public function update (UserRequest $request, User $user)
    {
        $data = $request->except('_token', '_method', 'role_id');
        if (!empty($data['password'])) {
            if ($data['password'] == $data['password_confirmation']) {
                $data['password'] = bcrypt($data['password']);
            } else {
                return ["error" => __('main.pass_confirm_error')];
            }
        } else {
            unset($data['password']);
        }
        $role = $request->input('role_id');

        if ($user->update($data)) {
            $user->roles()->sync($role);
            return ['status' => __('main.user_edited')];
        } else {
            return ['error' => __('main.save_error')];
        }
    }

    public function destroy (User $user)
    {
        if ($user->delete()) {
            $user->roles()->detach();
            return ['status' => __('main.user_deleted')];
        } else {
            return ['error' => __('main.deleted_error')];
        }
    }

    /*                  Permissions                  */

    public function savePermissions(Request $request)
    {
        $data = $request->except('_token');
        $roles = Role::all();

        foreach ($roles as $role) {
            if (isset($data[$role->id])) {
                $role->savePermissions($data[$role->id]);
            } else {
                $role->savePermissions([]);
            }
        }
        return redirect()->route('users.permissions');
    }
}
