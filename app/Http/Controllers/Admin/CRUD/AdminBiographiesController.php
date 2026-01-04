<?php

namespace App\Http\Controllers\Admin\CRUD;

use App\Http\Traits\Upload_Files;
use App\Http\Controllers\Controller;
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
use App\Models\Order;
use ConvertApi\ConvertApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use App\Models\Language;
use Illuminate\Support\Str;
use App\Services\SMS\MesgatSMS;

class AdminBiographiesController extends Controller
{

    use Upload_Files,MesgatSMS;
    // use CheckPermission;


    public function __construct()
    {
        /* $this->middleware([('permission:siteTexts index,admin')])->only(['index']);*/
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if(!checkPermission(18))
            return view('admin.permission');

        $admin=  \App\Models\Admin::find(admin()->id());
        $roles= $admin->roles;
        $count=0;
        $passport_key=$request->passport_key;
        $nationality_id=$request->nationality_id ;
        $social_type_id=$request->social_type ;
        $booking_status = $request->booking_status?$request->booking_status:'';
        $recruitment_office_id = $request->recruitment_office_id;
        $natinalities=Nationalitie::get();
        $recruitment_office = RecruitmentOffice::get();
        $social_type = SocialType::get();
        $type = $request->type;
        $date = $request->date;

        $religion_id = $request->religion_id;
        $religions = Religion::all();

        $social_status_id = $request->social_status_id;

        $social_statuses = SocialType::all();

        if ($request->ajax()) {
            $biographies= Biography::query()->where("order_type","normal")->where("is_blocked", 0)->orderBy("id","DESC");


            if ($request->passport_key != null) {
                $biographies = $biographies->  where('passport_number', $passport_key);
//
            }

            if ($request->social_type != null) {

                if ($social_type_id == 1) {
                    $biographies = $biographies->  where('type_of_experience', 'new');

                } else if ($social_type_id == 2) {
                    $biographies = $biographies->  where('type_of_experience','with_experience');


                }
            }

            if ($request->nationality_id != null) {
                $biographies = $biographies->  where('nationalitie_id', $nationality_id);

            }

            if ($request->recruitment_office_id != null) {
                $biographies = $biographies->where('recruitment_office_id', $recruitment_office_id);

            }
            if ($request->booking_status != null) {
                $biographies = $biographies->where('status', $booking_status);
            }
            if ($request->type != null) {
                $biographies = $biographies->where('type', $type);
            }
            if ($date != null) {
                $biographies = $biographies->whereDate('created_at', '>=', date('Y-m-d', strtotime(explode(" - ", $date)[0])))->whereDate('created_at', '<=', date('Y-m-d', strtotime(explode(" - ", $date)[1])));
            }

            if ($request->religion_id != null) {
                $biographies = $biographies->where('religion_id', $religion_id);
            }

            if ($request->social_status_id != null) {
                $biographies = $biographies->where('social_type_id', $social_status_id);
            }

            return DataTables::of($biographies)
                ->editColumn('image', function ($row) {
                    return ' <img src="'.get_file($row->cv_file).'" class="rounded" style="height:60px;width:60px;object-fit: contain;"
                             onclick="window.open(this.src)">';
                })
                ->editColumn('smart_image', function ($row) {
                    $imgs='
                  <div class="moreImgs">';

                    foreach($row->images as $image) {
                        $imgs .= '<a data-fancybox="users' . $row->id . '-CV" href="' . get_file($image->image) . '" target="_blank">
                            <img src="' . get_file($image->image) . '" class="rounded" style="height:60px;width:60px;">
                        </a>';
                    }
                    $imgs .= ' </div>';

                    return $imgs ;
                })
                ->editColumn('created_at', function ($row) {
                    return date('Y/m/d',strtotime($row->created_at));
                })
                ->editColumn('type', function ($row) {
                    if ($row->type == 'admission')
                        return 'استقدام ';
                    else if ($row->type == 'rental')
                        return 'تاجير ';
                    else
                        return 'نقل خدمات  ';
                })
                ->addColumn('religion', function ($row) {
                    return optional($row->religion)->title;
                })
                ->addColumn('delete_all', function ($row) {
                    return "<input type='checkbox' class=' delete-all form-check-input' data-tablesaw-checkall name='delete_all' id='" . $row->id . "'>";
                })
                ->editColumn('status', function ($row) {




                    if ($row->status == "new") {
                        return "غير محجوز";
                    } elseif ($row->status == "under_work") {
                        return "حجز السيرة الذاتيه";
                    }
                    elseif ($row->status == "contract") {
                        return "تم التعاقد";
                    } elseif ($row->status == "musaned") {
                        return "تم الربط في مساند ";
                    }
                    elseif ($row->status == "traning") {
                        return "تحت الاجراء و التدريب";
                    }
                    elseif ($row->status == "tfeez") {
                        return " التفييز ";
                    }
                    elseif ($row->status == "finished") {
                        return "وصول العمالة";
                    }
                    elseif ($row->status == "canceled") {
                        return "ملغية";
                    }
                    elseif ($row->status == "pending") {
                        return "معلق";
                    }
                    else {
                        return "لاتوجد حالة بعد";
                    }

                })
                ->editColumn('nationalitie_id', function ($row) {
                    return $row->nationalitie->title;
                })
                ->addColumn('actions', function ($row) {
                    $edit = '';
                    $delete = '';
                    if (!checkPermission(20))
                        $edit = 'hidden';
                    if (!checkPermission(21))
                        $delete = 'hidden';
                    $actions = '';
                    /*if ($row->status == 'new') {
                        $actions .= "
                            <button type='button'
                                    class='btn btn-primary reserve-btn'
                                    title='حجز العاملة'
                                    data-id='{$row->id}'>
                                <i class='fas fa-user-check'></i>
                            </button>
                        ";
                    }*/
                    // زر الحظر / إلغاء الحظر
                    $blockButton = '';
                    if (checkPermission(46)) {
                        if ($row->is_blocked) {
                            $blockButton = '<a href="#" data-id="'.$row->id.'" class="btn btn-success toggle-block" data-status="0"><i class="fa fa-unlock"></i> إلغاء الحظر</a>';
                        } else {
                            $blockButton = '<a href="#" data-id="'.$row->id.'" class="btn btn-danger toggle-block" data-status="1"><i class="fa fa-ban"></i> حظر</a>';
                        }
                    }

                    if($row->status=="pending"){
                        return $actions."
                            <a " .$edit. " href='" . route('biographies.edit',$row->id) . "' class='btn btn-info editButton' id='" . $row->id . "'>
                                <i class='fa fa-edit'></i>
                            </a>
                            <a href='" . route('biographies.unban',$row->id) . "' class='btn btn-success benButton'>
                                <i class='fa fa-unlock'></i>
                            </a>
                            $blockButton
                            <a " .$delete. " style='margin-right: 10px;' href='#' class='btn btn-danger delete mr-2' id='" . $row->id . "'>
                                <i class='fa fa-trash'></i>
                            </a>";
                    } elseif($row->status=="new") {
                        return $actions."
                            <a " .$edit. " href='" . route('biographies.edit',$row->id) . "' class='btn btn-info editButton' id='" . $row->id . "'>
                                <i class='fa fa-edit'></i>
                            </a>
                            <a href='" . route('biographies.ban',$row->id) . "' class='btn btn-warning benButton'>
                                <i class='fa fa-unlock-alt'></i>
                            </a>
                            $blockButton
                            <a " .$delete. " style='margin-right: 10px;' href='#' class='btn btn-danger delete mr-2' id='" . $row->id . "'>
                                <i class='fa fa-trash'></i>
                            </a>";
                    } else {
                        return $actions."
                            <a " .$edit. " href='" . route('biographies.edit',$row->id) . "' class='btn btn-info editButton' id='" . $row->id . "'>
                                <i class='fa fa-edit'></i>
                            </a>
                            $blockButton
                            <a " .$delete. " style='margin-right: 10px;' href='#' class='btn btn-danger delete mr-2' id='" . $row->id . "'>
                                <i class='fa fa-trash'></i>
                            </a>";
                    }
                })
                ->rawColumns(['actions','image','delete_all','nationalitie_id','status','smart_image'])->make(true);
        }
        return view('admin.crud.biographies.index', compact('natinalities', 'nationality_id', 'social_type', 'social_type_id', 'booking_status', 'recruitment_office', 'recruitment_office_id', 'type','date' , 'religions', 'religion_id' , 'social_statuses', 'social_status_id'));
    }
    public function searchUsers(Request $request)
    {
        $q = $request->get('q', '');
        $all = $request->boolean('all', false);
        $table = $request->get('table', 'users'); // users أو admins

        if ($table === 'users') {
            // العملاء
            $query = \App\Models\User::query();
        } else {
            // المسوقين فقط (admins != 0)
            $query = \App\Models\Admin::where('admin_type', '!=', 0);
        }

        if (!$all && !empty($q)) {
            // لو فيه بحث، فلتر بالاسم أو الجوال
            $query->where(function($q2) use ($q) {
                $q2->where('name', 'like', "%$q%")
                ->orWhere('phone', 'like', "%$q%");
            });
        }

        $items = $query->select('id', 'name', 'phone')
                    ->orderBy('name')
                    ->get();

        return $items->map(fn($i) => [
            'id' => $i->id,
            'text' => $i->name . ' - ' . $i->phone
        ]);
    }
    public function reserveWorker(Request $request)
    {
        $this->validate($request, [
            'cv_id' => 'required|exists:biographies,id',
            'customer_id' => 'required|exists:users,id',
            'marketer_id' => 'required|exists:admins,id',
        ]);

        $cv = Biography::find($request->cv_id);

        if ($cv->status != 'new') {
            return response(['message' => 'لا يمكن الحجز، السيرة ليست متاحة'], 400);
        }

        // 🔹 بيانات الحجز
        $orderData = [
            'user_id'   => $request->customer_id,
            'status'    => 'under_work',
            'admin_id'  => $request->marketer_id,
            'order_date'=> now(),
        ];

        // 🔹 إنشاء الطلب
        $orderData['biography_id'] = $cv->id;
        $orderData['order_code']   = 'NK' . $cv->id . time();

        $order = Order::create($orderData);

        // 🔹 تحديث حالة السيرة
        Biography::where('id', $cv->id)->update(['status' => 'under_work']);

        // ✅ إرسال الرسائل SMS

        // 1. رسالة إلى العميل
        $user = \App\Models\User::find($request->customer_id);
        if (!empty($user->phone)) {
            $this->sendSMS($user->phone, 'لقد قمت بطلب استقدام جديد.');
        }

        // 2. رسالة إلى المسوق
        $admin = \App\Models\Admin::find($request->marketer_id);
        if ($admin && !empty($admin->phone)) {
            $msg = "مرحبًا الموظف " . $admin->name . ",\n" .
                "لقد قمت بحجز السيرة الذاتية للعاملة " . $cv->name .
                " للعميل " . $user->name . " بنجاح.\n" .
                "رقم جوال العميل: " . $user->phone . ".";
            $this->sendSMS($admin->phone, $msg);
        }

        return response([
            'order_code' => $order->order_code,
            'message' => 'تم حجز العاملة وإرسال الإشعارات بنجاح'
        ], 200);
    }
    public function biographiesBlock(Request $request)
    {

        if(!checkPermission(45))
            return view('admin.permission');

        $admin=  \App\Models\Admin::find(admin()->id());
        $roles= $admin->roles;
        $count=0;
        $passport_key=$request->passport_key;
        $nationality_id=$request->nationality_id ;
        $social_type_id=$request->social_type ;
        $booking_status = $request->booking_status?$request->booking_status:'';
        $recruitment_office_id = $request->recruitment_office_id;
        $natinalities=Nationalitie::get();
        $recruitment_office = RecruitmentOffice::get();
        $social_type = SocialType::get();
        $type = $request->type;
        $date = $request->date;

        $religion_id = $request->religion_id;
        $religions = Religion::all();

        $social_status_id = $request->social_status_id;

        $social_statuses = SocialType::all();

        if ($request->ajax()) {
            $biographies= Biography::query()->where("order_type","normal")->where("is_blocked", 1)->orderBy("id","DESC");


            if ($request->passport_key != null) {
                $biographies = $biographies->  where('passport_number', $passport_key);
//
            }

            if ($request->social_type != null) {

                if ($social_type_id == 1) {
                    $biographies = $biographies->  where('type_of_experience', 'new');

                } else if ($social_type_id == 2) {
                    $biographies = $biographies->  where('type_of_experience','with_experience');


                }
            }

            if ($request->nationality_id != null) {
                $biographies = $biographies->  where('nationalitie_id', $nationality_id);

            }

            if ($request->recruitment_office_id != null) {
                $biographies = $biographies->where('recruitment_office_id', $recruitment_office_id);

            }
            if ($request->booking_status != null) {
                $biographies = $biographies->where('status', $booking_status);
            }
            if ($request->type != null) {
                $biographies = $biographies->where('type', $type);
            }
            if ($date != null) {
                $biographies = $biographies->whereDate('created_at', '>=', date('Y-m-d', strtotime(explode(" - ", $date)[0])))->whereDate('created_at', '<=', date('Y-m-d', strtotime(explode(" - ", $date)[1])));
            }

            if ($request->religion_id != null) {
                $biographies = $biographies->where('religion_id', $religion_id);
            }

            if ($request->social_status_id != null) {
                $biographies = $biographies->where('social_type_id', $social_status_id);
            }

            return DataTables::of($biographies)
                ->editColumn('image', function ($row) {
                    return ' <img src="'.get_file($row->cv_file).'" class="rounded" style="height:60px;width:60px;object-fit: contain;"
                             onclick="window.open(this.src)">';
                })
                ->editColumn('smart_image', function ($row) {
                    $imgs='
                  <div class="moreImgs">';

                    foreach($row->images as $image) {
                        $imgs .= '<a data-fancybox="users' . $row->id . '-CV" href="' . get_file($image->image) . '" target="_blank">
                            <img src="' . get_file($image->image) . '" class="rounded" style="height:60px;width:60px;">
                        </a>';
                    }
                    $imgs .= ' </div>';

                    return $imgs ;
                })
                ->editColumn('created_at', function ($row) {
                    return date('Y/m/d',strtotime($row->created_at));
                })
                ->editColumn('type', function ($row) {
                    if ($row->type == 'admission')
                        return 'استقدام ';
                    else if ($row->type == 'rental')
                        return 'تاجير ';
                    else
                        return 'نقل خدمات  ';
                })
                ->addColumn('religion', function ($row) {
                    return optional($row->religion)->title;
                })
                ->addColumn('delete_all', function ($row) {
                    return "<input type='checkbox' class=' delete-all form-check-input' data-tablesaw-checkall name='delete_all' id='" . $row->id . "'>";
                })
                ->editColumn('status', function ($row) {




                    if ($row->status == "new") {
                        return "غير محجوز";
                    } elseif ($row->status == "under_work") {
                        return "حجز السيرة الذاتيه";
                    }
                    elseif ($row->status == "contract") {
                        return "تم التعاقد";
                    } elseif ($row->status == "musaned") {
                        return "تم الربط في مساند ";
                    }
                    elseif ($row->status == "traning") {
                        return "تحت الاجراء و التدريب";
                    }
                    elseif ($row->status == "tfeez") {
                        return " التفييز ";
                    }
                    elseif ($row->status == "finished") {
                        return "وصول العمالة";
                    }
                    elseif ($row->status == "canceled") {
                        return "ملغية";
                    }
                    elseif ($row->status == "pending") {
                        return "معلق";
                    }
                    else {
                        return "لاتوجد حالة بعد";
                    }

                })
                ->editColumn('nationalitie_id', function ($row) {
                    return $row->nationalitie->title;
                })
                ->addColumn('actions', function ($row) {
                    $edit = '';
                    $delete = '';
                    if (!checkPermission(20))
                        $edit = 'hidden';
                    if (!checkPermission(21))
                        $delete = 'hidden';
                    $actions = '';

                    $blockButton = '';
                    if (checkPermission(46)) {
                        if ($row->is_blocked) {
                            $blockButton = '<a href="#" data-id="'.$row->id.'" class="btn btn-success toggle-block" data-status="0"><i class="fa fa-unlock"></i> إلغاء الحظر</a>';
                        } else {
                            $blockButton = '<a href="#" data-id="'.$row->id.'" class="btn btn-danger toggle-block" data-status="1"><i class="fa fa-ban"></i> حظر</a>';
                        }
                    }

                    if($row->status=="pending"){
                        return $actions."
                            <a " .$edit. " href='" . route('biographies.edit',$row->id) . "' class='btn btn-info editButton' id='" . $row->id . "'>
                                <i class='fa fa-edit'></i>
                            </a>
                            <a href='" . route('biographies.unban',$row->id) . "' class='btn btn-success benButton'>
                                <i class='fa fa-unlock'></i>
                            </a>
                            $blockButton
                            <a " .$delete. " style='margin-right: 10px;' href='#' class='btn btn-danger delete mr-2' id='" . $row->id . "'>
                                <i class='fa fa-trash'></i>
                            </a>";
                    } elseif($row->status=="new") {
                        return $actions."
                            <a " .$edit. " href='" . route('biographies.edit',$row->id) . "' class='btn btn-info editButton' id='" . $row->id . "'>
                                <i class='fa fa-edit'></i>
                            </a>
                            <a href='" . route('biographies.ban',$row->id) . "' class='btn btn-warning benButton'>
                                <i class='fa fa-unlock-alt'></i>
                            </a>
                            $blockButton
                            <a " .$delete. " style='margin-right: 10px;' href='#' class='btn btn-danger delete mr-2' id='" . $row->id . "'>
                                <i class='fa fa-trash'></i>
                            </a>";
                    } else {
                        return $actions."
                            <a " .$edit. " href='" . route('biographies.edit',$row->id) . "' class='btn btn-info editButton' id='" . $row->id . "'>
                                <i class='fa fa-edit'></i>
                            </a>
                            $blockButton
                            <a " .$delete. " style='margin-right: 10px;' href='#' class='btn btn-danger delete mr-2' id='" . $row->id . "'>
                                <i class='fa fa-trash'></i>
                            </a>";
                    }
                })
                ->rawColumns(['actions','image','delete_all','nationalitie_id','status','smart_image'])->make(true);
        }
        return view('admin.crud.biographies.biographiesBlock', compact('natinalities', 'nationality_id', 'social_type', 'social_type_id', 'booking_status', 'recruitment_office', 'recruitment_office_id', 'type','date' , 'religions', 'religion_id' , 'social_statuses', 'social_status_id'));
    }
    public function cvsDownload($id)
    {
        $cv=Biography::find($id);
        if($cv->new_image!=null){
            if (file_exists(public_path().'/'.$cv->new_image)){
                unlink(public_path().'/'.$cv->new_image);
            }}
        ConvertApi::setApiSecret(env('FILE_CONVERTER_KEY'));
        $result = ConvertApi::convert('png', [
            'File' => route('frontend.cvDesign',$id),
            'WebHook' => route('frontend.cvDesign',$id),
        ], 'html'
        );
        $name=Str::random(5).'_'.time().'.png';
        $dirname='new_cvs/time_'.$name;
        $result->saveFiles(base_path('/storage/app/public/uploads/'.$dirname));
        $cv->new_image=$dirname;
        $cv->save();
        return redirect()->route('biographies.index');

    }
    public function ban_biographies($id)
    {
        $biographie= Biography::find($id);
        $biographie->status="pending";
        $biographie->save();
        return redirect()->route('biographies.index');

    }
    public function unban_biographies($id)
    {
        $biographie= Biography::find($id);
        $biographie->status="new";
        $biographie->save();
        return redirect()->route('biographies.index');

    }

    public function toggleBlock(Request $request)
    {
        $ids = is_array($request->id) ? $request->id : [$request->id];

        Biography::whereIn('id', $ids)->update([
            'is_blocked' => $request->status
        ]);

        $message = $request->status == 1 ? 'تم حظر العناصر المحددة بنجاح' : 'تم إلغاء الحظر بنجاح';

        return response()->json(['message' => $message], 200);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = [
            'languages'=>Language::where('is_active','active')->get(),
            'recruitment_office'=>RecruitmentOffice::get(),
            'nationalitie'=>Nationalitie::get(),
            'religion'=>Religion::get(),
            'job'=>Job::get(),
            'social_type'=>SocialType::get(),
            'skills'=>Skill::get(),
            'language_title'=>LanguageTitle::get(),
        ];
        return  view('admin.crud.biographies.create',$data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->is_cv_out == 'on'){
            $this->validate($request, [
                'nationalitie_id' => 'required',
                'passport_number' => 'required|max:255|unique:biographies,passport_number',
                'cv_name' => 'required',
            ]);
        }else {
            $this->validate($request, [
                'cv_file' => 'nullable',
                'recruitment_office_id' => 'required',
                'nationalitie_id' => 'required',
                'language_title_id' => 'required',
                'religion_id' => 'required',
                'job_id' => 'required',
                'social_type_id' => 'required',
                'age' => 'required',
                'salary' => 'required',
                'passport_number' => 'required|max:255|unique:biographies,passport_number',
                'skills' => 'nullable|array',
                'certificates.*' => 'required|file|image',
//                'high_degree' => 'nullable',
                'type' => 'required',
                'reasonService' => 'nullable',
                'periodService' => 'nullable',
                'transferprice' => 'nullable',
                'rentalprice' => 'nullable',
                //new
                'passport_created_at' => 'nullable',
                'passport_ended_at' => 'nullable',
                'passport_place' => 'nullable',
                'cv_name' => 'required',
//                'weight' => 'required',
//                'height' => 'required',
//                'childern_number' => 'required',
//                'living_location' => 'required',
//                'arabic_degree' => 'required',
//                'english_degree' => 'required',
//                'video' => 'nullable',
                'type_of_experience' => 'required',
                'experience_country' => 'nullable',
                'experience_year' => 'nullable',
                'notes' => 'nullable',
            ]);
        }

        $data = $request->except(array_merge(['skills','images','cv_file'],range(0,100)));

        DB::beginTransaction();
        $data["is_cv_out"] =($request->is_cv_out== 'on')?1:0;
        if(isset($request->cv_file)) {
            $data["cv_file"] = $this->uploadFiles('biographies', $request->file('cv_file'), null);
        }
        $biography = Biography::create($data);

        $biography->new_image= worker_new_cv($biography->id);
        $biography->save();
        //skills
        if(isset($request->skills)) {
            foreach ($request->skills as $index => $skillid) {
                BiographySkill::create([
                    'biography_id' => $biography->id,
                    'skill_id' => $skillid,
                    'level' => $request->$skillid,
                ]);
            }
        }

        //biography galary
        if(isset($request->images)){
            foreach ($request->images as $index=>$single_image){
                BiographyImage::create([
                    'biography_id'=>$biography->id,
                    'image'=> $this->uploadFiles('biographies',$single_image,null )
                ]);
            }
        }

        DB::commit();
        //Cache::forget('cvs_all_workers');


        return response()->json([],200);
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
        $biography = Biography::with('images','skills')->findOrFail($id);
        $skill_ids = $biography->skills->pluck('skill_id')->toArray();


        $images = [];
        if (!is_null($biography->images()->get())) {
            foreach ($biography->images()->get() as $index=>$image) {
                $images[$index]['id'] = $image->id;
                $images[$index]['src'] = get_file($image->image);
            }
        }

        $data = [
            'languages'=>Language::where('is_active','active')->get(),
            'recruitment_office'=>RecruitmentOffice::get(),
            'nationalitie'=>Nationalitie::get(),
            'religion'=>Religion::get(),
            'job'=>Job::get(),
            'social_type'=>SocialType::get(),
            'skills'=>Skill::get(),
            'language_title'=>LanguageTitle::get(),
            'skill_ids'=>json_encode($skill_ids),
            'images'=>$images,
            'biography'=>$biography,
            'reasonService'=>'nullable',
            'periodService'=>'nullable',
            'transferprice'=>'nullable',
            'rentalprice'=>'nullable',
        ];
        return  view('admin.crud.biographies.edit',$data);
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

       $this->validate($request,[
            'cv_file'=>'nullable',
            'recruitment_office_id'=>'required',
            'nationalitie_id'=>'required',
            'language_title_id'=>'required',
            'religion_id'=>'required',
            'job_id'=>'required',
            'social_type_id'=>'required',
            'age'=>'required',
            'salary'=>'required',
//            'biography_number'=>'required',
            'passport_number' => 'required|max:255|unique:biographies,passport_number,'.$id,
            'skills'=>'nullable|array',
            'certificates.*'=>'nullable|file|image',
            'high_degree'=>'nullable',
            'type'=>'required',
            'reasonService'=>'nullable',
            'periodService'=>'nullable',
            'transferprice'=>'nullable',
            'rentalprice'=>'nullable',
            //new
            'passport_created_at' => 'nullable',
            'passport_ended_at' => 'nullable',
            'passport_place' => 'nullable',
            'cv_name' => 'required',
//            'weight' => 'required',
//            'height' => 'required',
//            'childern_number' => 'required',
//            'living_location' => 'required',
//            'arabic_degree' => 'required',
//            'english_degree' => 'required',
//            'video' => 'nullable',
            'type_of_experience' => 'required',
            'experience_country' => 'nullable',
            'experience_year' => 'nullable',
//            'notes' => 'nullable',
        ]);

//        $data = $request->except(['skills','images','cv_file','old']);
        $data = $request->except(array_merge(['skills','images','cv_file','old','cv_file'],range(0,100)));

//        try {
//
//        }catch (\Exception $exception){
//
//            DB::rollBack();
//        }

//        DB::beginTransaction();

        /*if($request->cv_file)
            $data["cv_file"] =  $this->uploadFiles('biographies',$request->file('cv_file'),null );
        $data["is_cv_out"] =($request->is_cv_out== 'on')?1:0;*/

        //$biography=   Biography::find($id)->update($data);
        //$biography=   Biography::find($id);

        /************** */
        $biography = Biography::find($id);

        $oldOfficeId = $biography->recruitment_office_id;

        if ($request->cv_file) {
            $data["cv_file"] = $this->uploadFiles('biographies', $request->file('cv_file'), null);
        }
        $data["is_cv_out"] = ($request->is_cv_out == 'on') ? 1 : 0;

        $biography->update($data);

        $biography = Biography::find($id);
        $newOfficeId = $biography->recruitment_office_id;

        if ($oldOfficeId != $newOfficeId) {

            $oldOfficeTotal = \App\Models\Biography::where('recruitment_office_id', $oldOfficeId)->count();
            $oldOfficeHiddenCount = \App\Models\Biography::where('recruitment_office_id', $oldOfficeId)
                ->where('is_hide', 1)
                ->count();
            $oldOfficeAllHidden = ($oldOfficeTotal > 0 && $oldOfficeHiddenCount == $oldOfficeTotal);

            $newOfficeTotal = \App\Models\Biography::where('recruitment_office_id', $newOfficeId)->count();
            if ($oldOfficeId != $newOfficeId) {
                $oldOfficeTotal = \App\Models\Biography::where('recruitment_office_id', $oldOfficeId)->count();
                $oldOfficeHiddenCount = \App\Models\Biography::where('recruitment_office_id', $oldOfficeId)
                    ->where('is_hide', 1)
                    ->count();
                $oldOfficeAllHidden = ($oldOfficeTotal > 0 && $oldOfficeHiddenCount == $oldOfficeTotal);

                $newOfficeTotal = \App\Models\Biography::where('recruitment_office_id', $newOfficeId)
                    ->where('id', '!=', $biography->id)
                    ->count();
                $newOfficeVisibleCount = \App\Models\Biography::where('recruitment_office_id', $newOfficeId)
                    ->where('is_hide', 0)
                    ->where('id', '!=', $biography->id)
                    ->count();

                $newOfficeAllVisible = ($newOfficeTotal > 0 && $newOfficeVisibleCount == $newOfficeTotal);

                if ($oldOfficeAllHidden && $newOfficeAllVisible) {
                    $biography->is_hide = 0;
                    $biography->save();
                } elseif (!$oldOfficeAllHidden && !$newOfficeAllVisible) {
                    $biography->is_hide = 1;
                    $biography->save();
                }
            }

            if ($oldOfficeAllHidden && $newOfficeAllVisible) {
                $biography->is_hide = 0;
                $biography->save();
            }
            elseif (!$oldOfficeAllHidden && !$newOfficeAllVisible) {
                $biography->is_hide = 1;
                $biography->save();
            }
        }
        /**********/

        if($biography->new_image!=null){
            if (file_exists(public_path().'/'.$biography->new_image)){
                unlink(public_path().'/'.$biography->new_image);
            }}
        $biography->new_image= worker_new_cv($biography->id);
        $biography->save();

        //skills
        if (isset($request->skills)) {
            foreach ($request->skills as  $skillid) {
                if(BiographySkill::where('biography_id',$id)->where('skill_id',$skillid)->count()==0) {
                    BiographySkill::create([
                        'biography_id' => $id,
                        'level' => $request->$skillid,
                        'skill_id' => $skillid
                    ]);
                }else{
                   $skill= BiographySkill::where('biography_id',$id)->where('skill_id',$skillid)->first();
                    $skill->level=$request->$skillid;
                    $skill->save();
                }
            }
        }


        //product galary
        if($request->old) {
            BiographyImage::where('biography_id', $id)
                ->whereNotIn('id', $request->old)
                ->delete();
        }
        else
        {
            BiographyImage::where('biography_id', $id)
                ->delete();
        }

        if (isset($request->images) && count($request->images) > 0) {
            foreach ($request->images as $single_image){
                BiographyImage::create([
                    'biography_id'=>$id,
                    'image'=> $this->uploadFiles('biographies',$single_image,null )
                ]);
            }
        }
//        DB::commit();
        //Cache::forget('cvs_all_workers');

        return response()->json([],200);
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
        /*$deleted = Biography::destroy($id);

        Cache::forget('cvs_all_workers');

        return response()->json($deleted, 200);*/
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function delete_all(Request $request)
    {
        Biography::destroy($request->id);
        //Cache::forget('cvs_all_workers');
        return response()->json(1,200);
    }


}//end
