<?php

namespace App\Http\Controllers\Admin\CRUD;

use App\Http\Traits\Upload_Files;
use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\RecruitmentOffice;
use App\Models\Biography;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;



class AdminRecruitmentOfficesController extends Controller
{

    use Upload_Files;


    public function __construct()
    {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function index(Request $request)
    {
if (!checkPermission(14))
    return view('admin.permission');
        if ($request->ajax()) {
            $dataTables = RecruitmentOffice::query()->latest();

            return DataTables::of($dataTables)

                ->editColumn('created_at', function ($row) {
                    return date('Y/m/d',strtotime($row->created_at));
                })
                ->editColumn('title', function ($row) {
                    return $row->title;
                })
                ->editColumn('country_id', function ($row) {
                    return $row->country->country_name??'';
                })
                ->addColumn('delete_all', function ($row) {
                    return "<input type='checkbox' class=' delete-all form-check-input' data-tablesaw-checkall name='delete_all' id='" . $row->id . "'>";
                })
                ->addColumn('actions', function ($row) {
                    $edit = '';
                    $delete = '';
                    if (!checkPermission(16)) $edit = 'hidden';
                    if (!checkPermission(17)) $delete = 'hidden';

                    $toggleText = \App\Models\Biography::where('recruitment_office_id', $row->id)->where('is_hide', 0)->exists() ? 'إخفاء السير الذاتية' : 'إظهار السير الذاتية';
                    $toggleClass = $toggleText === 'إخفاء السير الذاتية' ? 'btn-warning' : 'btn-success';

                    return "
                        <button " .$edit. " class='btn btn-info editButton' id='" . $row->id . "'><i class='fa fa-edit'></i></button>
                        <button " .$delete. " class='btn btn-danger delete' id='" . $row->id . "'><i class='fa fa-trash'></i></button>
                        <button class='btn {$toggleClass} toggle-hide-btn' data-id='{$row->id}'>
                            <i class='fa fa-eye-slash'></i> {$toggleText}
                        </button>
                    ";
                })->rawColumns(['actions', 'delete_all','title'])->make(true);
        }
        return view('admin.crud.recruitment_offices.index');
    }*/

    public function index(Request $request)
    {
        if (!checkPermission(14))
            return view('admin.permission');

        if ($request->ajax()) {
            $dataTables = RecruitmentOffice::query()->latest();

            return DataTables::of($dataTables)
                ->editColumn('created_at', function ($row) {
                    return date('Y/m/d', strtotime($row->created_at));
                })
                ->editColumn('title', function ($row) {
                    return $row->title;
                })
                ->editColumn('country_id', function ($row) {
                    return $row->country->country_name ?? '';
                })
                ->addColumn('delete_all', function ($row) {
                    return "<input type='checkbox' class='delete-all form-check-input' data-tablesaw-checkall name='delete_all' id='" . $row->id . "'>";
                })
                ->addColumn('actions', function ($row) {
                    $edit = '';
                    $delete = '';
                    if (!checkPermission(16)) $edit = 'hidden';
                    if (!checkPermission(17)) $delete = 'hidden';

                    // فحص ما إذا كانت السير الذاتية مفعّلة أو مخفية لهذا المكتب
                    $hasVisibleCVs = \App\Models\Biography::where('recruitment_office_id', $row->id)
                        ->where('is_hide', 0)
                        ->exists();

                    $toggleText = $hasVisibleCVs ? 'إخفاء السير الذاتية' : 'إظهار السير الذاتية';
                    $toggleClass = $hasVisibleCVs ? 'btn-warning' : 'btn-success';
                    $toggleIcon = $hasVisibleCVs ? 'fa-eye-slash' : 'fa-eye';
                    $toggleStatus = $hasVisibleCVs ? 1 : 0;

                    $actions = '';

                    $actions .= "
                        <button " . $edit . " class='btn btn-info editButton' id='" . $row->id . "'>
                            <i class='fa fa-edit'></i>
                        </button>
                        <button " . $delete . " class='btn btn-danger delete' id='" . $row->id . "'>
                            <i class='fa fa-trash'></i>
                        </button>
                    ";

                    // إضافة برمشن للزر الخاص بالتفعيل/إخفاء
                    if (checkPermission(47)) { // مثلا رقم 48 هو صلاحية التحكم في التفعيل/إخفاء
                        $actions .= "
                            <button class='btn {$toggleClass} toggle-hide-btn'
                                    data-id='{$row->id}'
                                    data-status='{$toggleStatus}'>
                                <i class='fa {$toggleIcon}'></i> {$toggleText}
                            </button>
                        ";
                    }

                    return $actions;
                })
                ->rawColumns(['actions', 'delete_all', 'title'])
                ->make(true);
        }

        return view('admin.crud.recruitment_offices.index');
    }


    public function toggleHide(Request $request)
    {
        $officeId = $request->id;
        $status = $request->status;

        // عكس القيمة: لو 1 (يعني هنخفي) => نخلي is_hide = 1
        // لو 0 (يعني هنظهر) => is_hide = 0
        $newStatus = $status == 1 ? 1 : 0;

        Biography::where('recruitment_office_id', $officeId)->update(['is_hide' => $newStatus]);

        return response()->json([
            'success' => true,
            'new_status' => $newStatus,
            'message' => $newStatus ? 'تم إخفاء السير الذاتية بنجاح' : 'تم إظهار السير الذاتية بنجاح'
        ]);

    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->ajax()){
            $returnHTML = view("admin.crud.recruitment_offices.parts.add_form")->with([
                'languages'=>Language::where('is_active','active')->get(),
            ])->render();
            return response()->json(array('success' => true, 'html'=>$returnHTML));
        }
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request,[
           /* 'image'=>'required|file|image',*/
            'title'=>'required|array',
            'title.*'=>'required',
           'country_id'=>'required',
           /* 'desc'=>'required|array',
            'desc.*'=>'required',*/
        ]);
        //$data = $request->except(['title','desc']);
        $name = [];
        foreach (Language::where('is_active','active')->get() as $index=>$language){
            $name[$language->title] = $request->title[$index];
        }
        $data['title'] = $name;
      /*  $data ['image'] = $this->uploadFiles('our_services',$request->file('image'),null );*/
        RecruitmentOffice::create($data);
        return response()->json(1,200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request , $id)
    {
        if ($request->ajax()){
            $returnHTML = view("admin.crud.recruitment_offices.parts.edit_form")
                ->with([
                    'obj' =>RecruitmentOffice::findOrFail($id),
                    'languages'=>Language::where('is_active','active')->get(),
                ])
                ->render();
            return response()->json(array('success' => true, 'html'=>$returnHTML));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $slider = RecruitmentOffice::findOrFail($id);
        $data = $this->validate($request,[
           /* 'image'=>'nullable|file|image',*/
            'title'=>'required|array',
            'title.*'=>'required',
           'country_id'=>'required'
           /* 'desc'=>'required|array',
            'desc.*'=>'required',*/
        ]);
        try{
            /*if ($request->hasFile('image')){
                $data ['image'] = $this->uploadFiles('our_services',$request->file('image'),$slider->image );
            }else{
                $data ['image'] = $slider->image;
            }*/
            $name = [];
           /* $desc = [];*/
            foreach (Language::where('is_active','active')->get() as $index=>$language){
                $name[$language->title] = $request->title[$index];
             /*   $desc[$language->title] = $request->desc[$index];*/
            }
            $data['title'] = $name;
          /*  $data['desc'] = $desc;*/
            $slider->update($data);
            return response()->json(1,200);
        }catch (\Exception $exception){
            return response()->json($exception->getMessage(),500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->json(RecruitmentOffice::destroy($id),200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function delete_all(Request $request)
    {
        RecruitmentOffice::destroy($request->id);
        return response()->json(1,200);
    }


}//end
