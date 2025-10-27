<?php

namespace App\Http\Actions\auth;

use App\Models\auth\Admin;
use App\Enums\auth\AdminTypes;
use App\Http\Actions\MainAction;
use App\Models\ingaz\RoleUser;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Facades\DB;


class AdminAction extends MainAction
{
    public function __construct()
    {
        $this->model = new Admin();
    }

    public function getAdminTypies()
    {
        return AdminTypes::cases();
    }

    public function storeAdmin($data,$request)
    {
        $admin = Admin::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'whatsapp'=>$data['whatsapp'],
            'phone'=>$data['phone'],
            'admin_type'=>$data['admin_type'],
            'sex_type'=>$data['sex_type'],
            'password'=> bcrypt($data['password'])
        ]);
        if ($request->has('roles')) {
            $roles = Role::whereIn('id', $request->roles)->get();
            $admin->syncRoles($roles);
        }
//        $admin->attachRole($data['admin_type']);

//        if($request->permissions) {
//            $permissions = Permission::whereIn('name',$request->permissions)->pluck('id')->toArray();
//            $admin->syncPermissions($permissions);
//        }

        return $admin;
    }

    public function updateAdmin($id, $data,$request)
    {
        $admin = $this->find($id);
        unset($data['roles']);
        $admin->update($data);
        DB::table('role_user')->where('user_id',$id)->delete();
        $roles = Role::whereIn('id', $request->roles)->get();
        $admin->syncRoles($roles);

        return $admin;
    }

}
