<?php


namespace App\Services;


use App\Policies\CategoryPolicy;
use App\Policies\ProductPolicy;
use App\Policies\RolePolicy;
use App\Policies\SettingPolicy;
use App\Policies\SliderPolicy;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate;

class PermissionGateAndPolicyAccess
{
    public function setGateAndPolicyAccess()
    {
        $this->defineGateProduct();
        $this->defineGateCategory();
        $this->defineGateSlider();
        $this->defineGateSettings();
        $this->defineGateUser();
        $this->defineGateRoles();
    }

    public function defineGateCategory()
    {
        Gate::define('category-list', [CategoryPolicy::class, 'view']);
        Gate::define('category-add', [CategoryPolicy::class, 'create']);
        Gate::define('category-edit', [CategoryPolicy::class, 'update']);
        Gate::define('category-delete', [CategoryPolicy::class, 'delete']);
    }

    public function defineGateProduct()
    {
        Gate::define('product-list', [ProductPolicy::class,'view']);
        Gate::define('product-add', [ProductPolicy::class, 'create']);
        Gate::define('product-edit', [ProductPolicy::class, 'update']);
        Gate::define('product-delete', [ProductPolicy::class, 'delete']);
    }

    public function defineGateSlider()
    {
        Gate::define('slider-list', [SliderPolicy::class,'view']);
        Gate::define('slider-add', [SliderPolicy::class, 'create']);
        Gate::define('slider-edit', [SliderPolicy::class, 'update']);
        Gate::define('slider-delete', [SliderPolicy::class, 'delete']);
    }

    public function defineGateSettings()
    {
        Gate::define('setting-list', [SettingPolicy::class,'view']);
        Gate::define('setting-add', [SettingPolicy::class, 'create']);
        Gate::define('setting-edit', [SettingPolicy::class, 'update']);
        Gate::define('setting-delete', [SettingPolicy::class, 'delete']);
    }

    public function defineGateUser()
    {
        Gate::define('user-list', [UserPolicy::class,'view']);
        Gate::define('user-add', [UserPolicy::class, 'create']);
        Gate::define('user-edit', [UserPolicy::class, 'update']);
        Gate::define('user-delete', [UserPolicy::class, 'delete']);
    }

    public function defineGateRoles()
    {
        Gate::define('role-list', [RolePolicy::class,'view']);
        Gate::define('role-add', [RolePolicy::class, 'create']);
        Gate::define('role-edit', [RolePolicy::class, 'update']);
        Gate::define('role-delete', [RolePolicy::class, 'delete']);
    }


}
