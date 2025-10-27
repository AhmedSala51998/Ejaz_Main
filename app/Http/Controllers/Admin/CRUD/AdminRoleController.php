<?php

namespace App\Http\Controllers\Admin\Crud;

use App\Http\Controllers\Controller;
use App\Models\AdminRole;
use App\Models\Permission;
use App\Models\PermissionRole;
use App\Models\RecruitmentOffice;
use App\Models\Role;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AdminRoleController extends Controller
{

    public function index(Request $request)
    {
        if (!checkPermission(40))
            return view('admin.permission');

        if ($request->ajax()) {
            $dataTables = Role::query()->latest();

            return DataTables::of($dataTables)

                ->editColumn('created_at', function ($row) {
                    return date('Y/m/d',strtotime($row->created_at));
                })

                ->addColumn('delete_all', function ($row) {
                    return "<input type='checkbox' class=' delete-all form-check-input' data-tablesaw-checkall name='delete_all' id='" . $row->id . "'>";
                })
                ->addColumn('actions', function ($row) {
                    $url=route('roles.edit',$row->id);
                    $edit = '';
                    $delete = '';
                    if (!checkPermission(42))
                        $edit = 'hidden';
                    if (!checkPermission(43))
                        $delete = 'hidden';
                    return "<a ".$edit."  href='".$url."' class='btn btn-info ' id='" . $row->id . "'> <i class='fa fa-edit'></i></a>
                   <button ".$delete." class='btn btn-danger  delete' id='" . $row->id . "'><i class='fa fa-trash'></i> </button>";
                })
                ->rawColumns(['actions','delete_all'])->make(true);
        }
        return view('admin.crud.role.index');
    }


    public function create()
    {
        if (!checkPermission(41))
            return view('admin.permission');
        $permissions=Permission::get();
        return view('admin.crud.role.create',compact('permissions'));

    }


    public function store(Request $request)
    {
        $validator=\Validator::make($request->all(),
            [
                'name'=>'required|max:30|min:3',

            ]);
        if ($validator->fails()) {
            return response()->json(['status'=>'errors','errors'=>$validator->errors()]);
        }
        $role = Role::create([
            'name' => $request->name,
        ]);
        if ($request->permissions) {

            for ($i = 0; $i < count($request->permissions); $i++) {
                PermissionRole::updateOrCreate([
                    'role_id' => $role->id,
                    'permission_id' => $request->permissions[$i],
                ]);
            }
        }
        return response()->json(['status'=>true]);
    }


    public function show($id)
    {

    }


    public function edit($id)
    {
        if(!checkPermission(42))
            return view('admin.permission');
        $role=Role::findOrFail($id);
        $permissions=Permission::get();
        return view('admin.crud.role.update',compact('permissions','role'));
    }


    public function update(Request $request, $id)
    {

        $validator=\Validator::make($request->all(),
            [
                'name'=>'required|max:30|min:3',

            ]);
        if ($validator->fails()) {
            return response()->json(['status'=>'errors','errors'=>$validator->errors()]);
        }
        $role = Role::findOrFail($id);
        $role->update([
            'name' => $request->name,
        ]);
        PermissionRole::where('role_id', $role->id)->delete();
        if ($request->permissions) {
            for ($i = 0; $i < count($request->permissions); $i++) {
                PermissionRole::updateOrCreate([
                    'role_id' => $role->id,
                    'permission_id' => $request->permissions[$i],
                ]);
            }
        }
        return response()->json(['status'=>true]);


    }


    public function destroy($id)
    {
        if(!checkPermission(43))
            return view('admin.permission');
//        $role = Role::findOrFail($id);
//        $permissions=$role->permissions;
//        if(count($permissions)>0) {
//            foreach ($permissions as $permission) {
//                PermissionRole::where('role_id',$role->id)->first()->delete();
//
//            }
//        }
//       AdminRole::where('role_id',$role->id)->first()->delete();
        return response()->json(Role::destroy($id),200);
    }
}
