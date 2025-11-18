<?php

namespace App\Http\Controllers\Admin;

use App\Http\Traits\Upload_Files;
use App\Models\Admin;
use App\Http\Controllers\Controller;
use App\Models\AdminRole;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;


class AdminAdminController extends Controller
{

    use Upload_Files;


    public function __construct()
    {

    }


    public function index(Request $request)
    {
      if(!checkPermission(6))
          return view('admin.permission');
        if ($request->ajax()) {
            $admins = Admin::where('id', '!=', auth('admin')->user()->id)
                ->latest()
                ->get();
            $edit='';
            $delete='';
            if(!checkPermission(8))
                $edit='hidden';
            if(!checkPermission(9))
                $delete='hidden';

            return DataTables::of($admins)
                ->addColumn('branch', function ($admin) {
                    $map = [
                        'riyadh' => 'الرياض',
                        'jeddah' => 'جدة',
                        'yanbu'  => 'ينبع',
                        'all_branches'  => 'كل الفروع',
                        'r_y'          => 'الرياض وينبع',
                        'y_j'          => 'ينبع وجدة',
                        'j_r'          => 'جدة والرياض',
                    ];
                    $colors = [
                        'riyadh'       => 'info',
                        'jeddah'       => 'success',
                        'yanbu'        => 'warning',
                        'all_branches' => 'dark',
                        'r_y'          => 'primary',
                        'y_j'          => 'secondary',
                        'j_r'          => 'danger',
                    ];

                    $key = $admin->branch;
                    $label = isset($map[$key]) ? $map[$key] : $key;
                    $branchColor = isset($colors[$key]) ? $colors[$key] : 'secondary';

                    return '<span class="badge bg-' . $branchColor . '">' . $label . '</span>';
                })
                ->editColumn('image', function ($admin) {
                    return ' <img height="60px" src="' . get_file($admin->image) . '" class=" w-60 rounded"
                             onclick="window.open(this.src)">';
                })
                ->editColumn('whats_up_number', function ($admin) {
                    return '
                    <div class="wideget-user-icons mb-4">
						<a href="https://wa.me/' . $admin->whats_up_number . '" class="bg-green-dark text-white btn btn-circle"><i class="fa fa-whatsapp" aria-hidden="true"></i>
<i class="fab fa-whatsapp text-dark fa-2x"></i></a>
					</div>
                    ';

                })
                ->editColumn('created_at', function ($admin) {
                    return date('Y/m/d', strtotime($admin->created_at));
                })
                ->addColumn('delete_all', function ($admin) {
                    return "<input type='checkbox' class=' delete-all form-check-input' data-tablesaw-checkall name='delete_all' id='" . $admin->id . "'>";
                })
                ->addColumn('actions', function ($admin) {
                    $edit='';
                    $delete='';
                    if(!checkPermission(8))
                        $edit='hidden';
                    if(!checkPermission(9))
                        $delete='hidden';
                    return "<button ".$edit."   class='btn btn-info editButton' id='" . $admin->id . "'> <i class='fa fa-edit'></i></button>
                   <button " .$delete. " class='btn btn-danger  delete' id='" . $admin->id . "'><i class='fa fa-trash'></i> </button>";
                })->rawColumns(['actions', 'image', 'whats_up_number', 'delete_all' , 'branch'])->make(true);
        }
        return view('admin.admins.index');
    }//end fun


    /**
     * @param Request $request
     * @return JsonResponse|void
     */
    public function create(Request $request)
    {

        if ($request->ajax()) {
            $returnHTML = view("admin.admins.parts.add_form")
                ->with([
                ])
                ->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        }
    }//end fun

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:admins,email',
            'password' => 'required',
            'phone' => 'required',
            'whats_up_number' => 'nullable',
            'image' => 'nullable|file|image',
            'admin_type'=>'required',
            'branch'=>'required',
        ]);
        $data['password'] = bcrypt($request->password);
        $data ['image'] = $this->uploadFiles('admins', $request->file('image'), null);

      $admin= Admin::create($data);
      //Cache::forget('admins');

        if($request->has('roles')){
            AdminRole::where('admin_id',$admin->id)->delete();

            for ($i=0;$i<count($request->roles);$i++)
            {
                AdminRole::updateOrCreate([
                    'admin_id'=>$admin->id,
                    'role_id'=>$request->roles[$i]
                ]);
            }

        }



        return response()->json(1, 200);

    }//end fun

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(Request $request, $id)
    {

        if ($request->ajax()) {
            $returnHTML = view("admin.admins.parts.edit_form")
                ->with([
                    'admin' => Admin::findOrFail($id)
                ])
                ->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);
        $data = $this->validate($request, [
            'name' => 'required',
            'email' => Rule::unique('admins')->ignore($id),
            'password' => 'nullable',
            'image' => 'nullable',
            'phone' => 'required',
            'whats_up_number' => 'nullable',
            'admin_type'=>'required',
            'branch'=>'required',

        ]);
        try {

            if ($request->password)
                $data['password'] = bcrypt($request->password);
            else
                $data['password'] = $admin->password;


            if ($request->hasFile('image'))
                $data ['image'] = $this->uploadFiles('admins', $request->file('image'), $admin->image);

            $admin->update($data);
            //Cache::forget('admins');


            if($request->has('roles')){
                AdminRole::where('admin_id',$id)->delete();

                for ($i=0;$i<count($request->roles);$i++)
                {
                    AdminRole::updateOrCreate([
                        'admin_id'=>$admin->id,
                        'role_id'=>$request->roles[$i]
                    ]);
                }

            }
            else {
                AdminRole::where('admin_id',$id)->delete();

            }



            return response()->json(1, 200);
        } catch (Exception $exception) {
            return response()->json($exception->getMessage(), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        return response()->json(Admin::destroy($id), 200);
        /*$deleted = Admin::destroy($id);

        Cache::forget('admins');

        return response()->json($deleted, 200);*/
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */

    public function delete_all(Request $request)
    {
        Admin::destroy($request->id);
        //Cache::forget('admins');
        return response()->json(1, 200);
    }


}//end
