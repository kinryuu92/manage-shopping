<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;
    public function view(User $user)
    {
        return $user->permissionCheckAccess('roles_list');
    }

    public function create(User $user)
    {
        return $user->permissionCheckAccess('roles_add');
    }

    public function update(User $user)
    {
        return $user->permissionCheckAccess('roles_edit');
    }

    public function delete(User $user)
    {
        return $user->permissionCheckAccess('roles_delete');
    }

}
