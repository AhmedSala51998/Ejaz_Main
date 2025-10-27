<?php

namespace App\Http\Controllers\Admin\CRUD;

use App\Http\Traits\Upload_Files;
use App\Http\Controllers\Controller;
use App\Models\AgeRange;
use App\Models\BiographyImage;
use App\Models\BiographySkill;
use App\Models\Job;
use App\Models\LanguageTitle;
use App\Models\Nationalitie;
use App\Models\RecruitmentOffice;
use App\Models\Religion;
use App\Models\Biography;
use App\Models\Skill;
use App\Models\SocialType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use App\Models\Language;

class AdminBiographiesSpecialController extends Controller
{

    use Upload_Files;
    // use CheckPermission;


    public function __construct()
    {
        /* $this->middleware([('permission:siteTexts index,admin')])->only(['index']);*/
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function index(Request $request)
    {
        if (!checkPermission(34))
            return view('admin.permission');
        if ($request->ajax()) {
            $biographies= Biography::query()->where("order_type","special")->orderBy("id","DESC");
            return DataTables::of($biographies)
                ->editColumn('created_at', function ($row) {
                    return date('Y/m/d',strtotime($row->created_at));
                })
                ->addColumn('delete_all', function ($row) {
                    return "<input type='checkbox' class=' delete-all form-check-input' data-tablesaw-checkall name='delete_all' id='" . $row->id . "'>";
                })
                ->editColumn('nationality', function ($row) {
                    return (isset($row->nationalitie->title))? $row->nationalitie->title:"غير محدد";
                })
                ->editColumn('religion', function ($row) {
                    return (isset($row->religion->title))? $row->religion->title:"غير محدد";
                })
                ->editColumn('social_type', function ($row) {
                    return (isset($row->social_type->title))? $row->social_type->title:"غير محدد";
                })
                ->editColumn('special_requirement', function ($row) {
                    $data= Str::limit($row->special_requirement, 20) ;
                    return "<button  class='showMessage btn btn-success'  data-text='$row->special_requirement' >$data</button>";
                })
                ->editColumn('job', function ($row) {
                    return (isset($row->job->title))? $row->job->title:"غير محدد";
                })
                ->editColumn('age', function ($row) {
                   $agerange=  AgeRange::find($row->order_of_age_id);
                    return    (isset($agerange))?__('frontend.from').$agerange->from.__('frontend.to').$agerange->to:"غير محدد";
                })
                ->addColumn('user', function ($row) {
                    return (isset($row->user->name))? $row->user->name:"غير محدد ";
                })
                ->addColumn('phone', function ($row) {
                    return (isset($row->user->phone))? $row->user->phone:"غير محدد ";
                })
                ->addColumn('actions', function ($row) {
                    $delete='';
                    if (!checkPermission(35))
                        $delete='hidden';
                    return "<a $delete style='margin-right: 10px;' href='#' class='btn btn-danger  delete mr-2' id='" . $row->id . "'><i class='fa fa-trash'></i> </a>

";
                })
                ->rawColumns(["created_at","age","religion","delete_all","nationality","social_type","job","user","phone","actions","special_requirement"])->make(true);
        }
        return view('admin.crud.biographies_special.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create(Request $request)
    {

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }//end fun

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request , $id)
    {

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

    }//end fun

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->json(Biography::destroy($id),200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function delete_all(Request $request)
    {
        Biography::destroy($request->id);
        return response()->json(1,200);
    }


}//end
