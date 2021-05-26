<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    public function view(User $user)
    {
        return $user->permissionCheckAccess('product_list');
    }


    public function create(User $user)
    {
        return $user->permissionCheckAccess('product_add');
    }


    public function update(User $user)
    {
        return $user->permissionCheckAccess('product_edit');
    }

    public function delete(User $user)
    {
        return $user->permissionCheckAccess('product_delete');
    }
}
