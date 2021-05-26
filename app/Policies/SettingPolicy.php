<?php

namespace App\Policies;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SettingPolicy
{
    use HandlesAuthorization;
    public function view(User $user)
    {
        return $user->permissionCheckAccess('setting_list');
    }


    public function create(User $user)
    {
        return $user->permissionCheckAccess('setting_add');
    }


    public function update(User $user)
    {
        return $user->permissionCheckAccess('setting_edit');
    }


    public function delete(User $user)
    {
        return $user->permissionCheckAccess('setting_delete');
    }

}
