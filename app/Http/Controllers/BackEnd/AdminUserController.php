<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Traits\DeleteModelTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use PHPUnit\Exception;

class AdminUserController extends Controller
{
    protected $user;
    protected $role;
    use DeleteModelTraits;
    public function __construct(User $user, Role $role)
    {
        $this->role = $role;
        $this->user = $user;
    }

    public function index()
    {
        $users = $this->user->paginate(5);
        return view('backEnd.admin.user.index', compact('users'));
    }

    public function create()
    {
        $roles = $this->role->all();
        return view('backEnd.admin.user.add', compact('roles'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $users = $this->user->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $users->roles()->attach($request->role_id);
            DB::commit();
            return redirect()->route('users.index');
        }catch (Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . '---Line: ' . $exception->getLine());
        }
    }

    public function edit($id)
    {
        $roles = $this->role->all();
        $user = $this->user->find($id);
        $rolesOfUser = $user->roles;
        return view('backEnd.admin.user.edit', compact('roles', 'user', 'rolesOfUser'));
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $this->user->find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $user = $this->user->find($id);
            $user->roles()->sync($request->role_id);
            DB::commit();
            return redirect()->route('users.index');
        } catch (Exception $exception) {
            DB::rollBack();
            log::error('Message : ' . $exception->getMessage() . '--- Line: ' . $exception->getLine());
        }
    }

    public function delete($id)
    {
     return  $this->deleteModelTraits($id, $this->user);
    }
}
