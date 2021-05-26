<?php

namespace App\Policies;

use App\Models\Slider;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SliderPolicy
{
    use HandlesAuthorization;


    public function view(User $user)
    {
        return $user->permissionCheckAccess('slider_list');
    }


    public function create(User $user)
    {
        return $user->permissionCheckAccess('slider_add');
    }

    public function update(User $user)
    {
        return $user->permissionCheckAccess('slider_edit');
    }


    public function delete(User $user)
    {
        return $user->permissionCheckAccess('slider_delete');
    }


}
