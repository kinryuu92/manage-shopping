<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function view(User $user)
    {
        return $user->permissionCheckAccess('users_list');
    }

    public function create(User $user)
    {
        return $user->permissionCheckAccess('users_add');
    }


    public function update(User $user)
    {
        return $user->permissionCheckAccess('users_edit');
    }

    public function delete(User $user)
    {
        return $user->permissionCheckAccess('users_delete');
    }

}
