<?php

namespace App\Policies;

use App\Models\User;
use App\Models\category;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    public function view(User $user)
    {
        return $user->permissionCheckAccess('category_list');
    }

    public function create(User $user)
    {
        return$user->permissionCheckAccess('category_add');
    }

    public function update(User $user)
    {
        return $user->permissionCheckAccess('category_edit');
    }

    public function delete(User $user)
    {
        return $user->permissionCheckAccess('category_delete');
    }

}
