<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Traits\DeleteModelTraits;
use Illuminate\Http\Request;

class AdminRoleController extends Controller
{
    protected $role;
    protected $permission;
    use DeleteModelTraits;


    public function __construct(Role $role, Permission $permission)
    {
        $this->role = $role;
        $this->permission = $permission;
    }

    public function index()
    {
        $roles = $this->role->paginate(5);
        return view('backEnd.admin.role.index', compact('roles'));
    }

    public function create()
    {
        $permissionsParent = $this->permission->where('parent_id', 0)->get();
        return view('backEnd.admin.role.add', compact('permissionsParent'));
    }

    public function store(Request $request)
    {
        $roles = $this->role->create([
            'name' => $request->name,
            'display_name' => $request->display_name,
        ]);
        $roles->permissions()->attach($request->permission_id);
        return redirect()->route('roles.index');
    }

    public function edit($id)
    {
        $permissionsParent = $this->permission->where('parent_id', 0)->get();
        $roles = $this->role->find($id);
        $permissionsChecked = $roles->permissions;
        return view('backEnd.admin.role.edit', compact('permissionsParent','roles','permissionsChecked'));
    }

    public function update($id, Request $request)
    {
        $roles = $this->role->find($id);
        $roles->update([
           'name' => $request->name,
           'display_name' => $request->display_name
        ]);
        $roles->permissions()->sync($request->permission_id);
        return redirect()->route('roles.index');
    }

    public function delete($id)
    {
        return $this->deleteModelTraits($id, $this->role);
    }
}
