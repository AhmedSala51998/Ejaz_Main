<?php

namespace App\Http\Controllers\Frontend\Worker;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomWorkerRequest;
use App\Models\Admin;
use App\Models\AgeRange;
use App\Models\Biography;
use App\Models\City;
use App\Models\Job;
use App\Models\LanguageTitle;
use App\Models\Nationalitie;
use App\Models\Order;
use App\Models\Religion;
use App\Models\Setting;
use App\Models\SocialType;
use App\Models\User;
use App\Services\SMS\MesgatSMS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class WorkerFrontController extends Controller
{

    use MesgatSMS;

    public function track_order_view()
    {
        return view('frontend.pages.trackOrder.trackOrder');
    }

    public function track_order(Request $request)
    {

        if (auth()->check()) {

            $order = Order::where('order_code', $request->code)->where('user_id', auth()->user()->id)->first();

            if (!empty($order)) {
                $admin = Admin::find($order->admin_id);
                if ($request->ajax()) {
                    return response()->json(['order_code' => $order->id], 200);
                }

                return view("frontend.pages.profile.parts.details_order", compact('order', 'admin'));
            } else {
                return response()->json([], 403);

//                toastr()->error('ﻻ يمكنك تتبع هذا الطلب', 'حدث خطأ ما');
//                return back();
            }
        } else {

            return response()->json([], 500);

//            toastr()->error('يجب تسجيل الدخول لاستخدام هذة الخدمة', 'حدث خطأ ما');
//            return back();
        }


    }

    public function order_details($code)
    {

        /*$order = Order::find($id);
        $admin = Admin::find($order->admin_id);

        return view("frontend.pages.profile.parts.details_order", compact('order', 'admin'));*/

        if (auth()->check()) {

            $order = Order::where('id', $code)->where('user_id', auth()->user()->id)->first();

            if (!empty($order)) {

                $admin = Admin::find($order->admin_id);
                $user = auth()->user();

                /*if ($request->ajax()) {

                    return response()->json(['order_code' => $order->id], 200);
                }*/

                return view("frontend.pages.profile.parts.details_order", compact('order', 'admin' , 'user'));
            } else {
                return response()->json([], 403);

//                toastr()->error('ﻻ يمكنك تتبع هذا الطلب', 'حدث خطأ ما');
//                return back();
            }
        } else {

            return response()->json([], 500);

//            toastr()->error('يجب تسجيل الدخول لاستخدام هذة الخدمة', 'حدث خطأ ما');
//            return back();
        }


    }
    /*public function showAllWorkers(Request $request,$id=null)
    {

        $country=Nationalitie::find($id);
        $countr_id=$id;
        if($country) {

            $cvs = Biography::where('status', 'new')
                ->where('order_type', 'normal')
                ->where('is_cv_out',0)
                ->FilterByAge($request->age)
                ->FilterByJob($request->job)
                ->FilterByNationality($country->id)->where('type','admission')
                ->with('recruitment_office', 'nationalitie', 'language_title',
                    'religion', 'job', 'social_type', 'admin', 'images', 'skills')
                ->latest()
                ->paginate(18);

            $countr_id=$id;
        }
        else{
            $cvs = Biography::where('status', 'new')
                ->where('order_type', 'normal')
                ->FilterByAge($request->age)
                ->where('is_cv_out',0)
                ->FilterByJob($request->job)
                ->FilterByNationality($request->nationality)->where('type','admission')
                ->with('recruitment_office', 'nationalitie', 'language_title',
                    'religion', 'job', 'social_type', 'admin', 'images', 'skills')
                ->latest()
                ->get();
            $countr_id='';
        }
//        $current_page = $cvs->currentPage() ;
//        $last_page =  $cvs->lastPage();

        if ($request->ajax()) {
            $returnHTML = view('frontend.pages.all-workers.worker.workers_page')
                ->with(['cvs' => $cvs])->render();
            return response()->json([
                'success' => true,
                'html' => $returnHTML,
//                'current_page' => $current_page,
//                'last_page' => $last_page,
            ]);
        }


        $ages = AgeRange::get();
        $jobs = Job::get();
        $nationalities = Nationalitie::get();




        return view('frontend.pages.all-workers.all-workers',[
            'ages'=>$ages,
            'jobs'=>$jobs,
            'nationalities'=>$nationalities,
            'cvs'=>$cvs,
//            'current_page' => $current_page,
//            'last_page' => $last_page,
            'country_id'=>$countr_id,
        ]);
    }*///end fun


    /*public function showAllWorkers(Request $request, $id = null)
    {
        $query = Biography::where('status', 'new')
            ->where('order_type', 'normal')
            ->where('type', 'admission')
            ->where('is_cv_out', 0)
            ->where('is_blocked', 0)
            ->where('is_hide', 0)
            ->with('recruitment_office', 'nationalitie', 'language_title',
                'religion', 'job', 'social_type', 'admin', 'images', 'skills');

        $religions = Religion::all();
        $social_types = SocialType::all();

        // فلترة حسب الدولة إن وجدت
        if ($id) {
            $country = Nationalitie::find($id);
            if ($country) {
                $query->where('nationalitie_id', $country->id);
            }
        } else {
            if ($request->nationality) {
                $query->where('nationalitie_id', $request->nationality);
            }
        }

        // باقي الفلاتر
        if ($request->age) {
            $query->FilterByAge($request->age);
        }

        if ($request->job) {
            $query->FilterByJob($request->job);
        }

        if ($request->religion) {
            $query->where('religion_id', $request->religion);
        }

        if ($request->social) {
            $query->where('social_type_id', $request->social);
        }

        // فلتر الخبرة العملية فقط في حالة الاستقدام
        if (!request()->routeIs('transferService') && !request()->routeIs('services-single')) {
            if ($request->type_of_experience !== null) {
                $query->where('type_of_experience', $request->type_of_experience);
            }
        }

        // ✅ الباجينيشن هنا
        $cvs = $query->latest()->paginate(9);

        // لو الطلب Ajax
        if ($request->ajax()) {
            $returnHTML = view('frontend.pages.all-workers.worker.workers_page', compact('cvs'))->render();

            return response()->json([
                'success' => true,
                'html' => $returnHTML,
                'current_page' => $cvs->currentPage(),
                'last_page' => $cvs->lastPage(),
            ]);
        }

        // البيانات المطلوبة
        $ages = AgeRange::all();
        $jobs = Job::all();
        $nationalities = Nationalitie::all();

        return view('frontend.pages.all-workers.all-workers', compact(
            'ages', 'jobs', 'nationalities', 'cvs' , 'religions', 'social_types'
        ));
    }*/

    /*public function showAllWorkers(Request $request, $id = null)
    {
        $query = Biography::where('status', 'new')
            ->where('order_type', 'normal')
            ->where('type', 'admission')
            ->where('is_cv_out', 0)
            ->where('is_blocked', 0)
            ->where('is_hide', 0)
            ->with('recruitment_office', 'nationalitie', 'language_title',
                'religion', 'job', 'social_type', 'admin', 'images', 'skills');

        $religions = Religion::all();
        $social_types = SocialType::all();

        // فلترة حسب الدولة إن وجدت
        if ($id) {
            $country = Nationalitie::find($id);
            if ($country) {
                $query->where('nationalitie_id', $country->id);
            }
        } else {
            if ($request->nationality) {
                $query->where('nationalitie_id', $request->nationality);
            }
        }

        // باقي الفلاتر
        if ($request->age) {
            $query->FilterByAge($request->age);
        }

        if ($request->job) {
            $query->FilterByJob($request->job);
        }

        if ($request->religion) {
            $query->where('religion_id', $request->religion);
        }

        if ($request->social) {
            $query->where('social_type_id', $request->social);
        }

        // فلتر الخبرة العملية فقط في حالة الاستقدام
        if (!request()->routeIs('transferService') && !request()->routeIs('services-single')) {
            if ($request->type_of_experience !== null) {
                $query->where('type_of_experience', $request->type_of_experience);
            }
        }

        // ✅ ترتيب بحيث الفلبينيات أولاً
        $query->orderByRaw('CASE WHEN nationalitie_id = 7 THEN 0 ELSE 1 END')
            ->latest();

        // ✅ الباجينيشن
        $cvs = $query->paginate(9);

        // لو الطلب Ajax
        if ($request->ajax()) {
            $returnHTML = view('frontend.pages.all-workers.worker.workers_page', compact('cvs'))->render();

            return response()->json([
                'success' => true,
                'html' => $returnHTML,
                'current_page' => $cvs->currentPage(),
                'last_page' => $cvs->lastPage(),
            ]);
        }

        // البيانات المطلوبة
        $ages = AgeRange::all();
        $jobs = Job::all();

        // ✅ ترتيب قائمة الدول بحيث الفلبين أولاً
        $nationalities = Nationalitie::orderByRaw('CASE WHEN id = 7 THEN 0 ELSE 1 END')->get();

        return view('frontend.pages.all-workers.all-workers', compact(
            'ages', 'jobs', 'nationalities', 'cvs', 'religions', 'social_types'
        ));
    }*/

    public function showAllWorkers(Request $request, $id = null)
    {
        // إنشاء مفتاح cache ديناميكي حسب الفلاتر
        $cacheKey = 'cvs_all_workers';

        // نستخدم cache forever أو TTL حسب رغبتك
        $cvs = Cache::rememberForever($cacheKey, function() use ($request, $id) {

            $query = Biography::where('status', 'new')
                ->where('order_type', 'normal')
                ->where('type', 'admission')
                ->where('is_cv_out', 0)
                ->where('is_blocked', 0)
                ->where('is_hide', 0)
                ->with([
                    'recruitment_office',
                    'nationalitie',
                    'language_title',
                    'religion',
                    'job',
                    'social_type',
                    'admin',
                    'images',
                    'skills'
                ]);

            // فلترة حسب الدولة إن وجدت
            if ($id) {
                $country = Nationalitie::find($id);
                if ($country) $query->where('nationalitie_id', $country->id);
            } elseif ($request->nationality) {
                $query->where('nationalitie_id', $request->nationality);
            }

            // باقي الفلاتر
            if ($request->age) $query->FilterByAge($request->age);
            if ($request->job) $query->FilterByJob($request->job);
            if ($request->religion) $query->where('religion_id', $request->religion);
            if ($request->social) $query->where('social_type_id', $request->social);

            if (!request()->routeIs('transferService') && !request()->routeIs('services-single')) {
                if ($request->type_of_experience !== null) {
                    $query->where('type_of_experience', $request->type_of_experience);
                }
            }

            // ترتيب بحيث الفلبينيات أولاً
            $query->orderByRaw('CASE WHEN nationalitie_id = 7 THEN 0 ELSE 1 END')
                ->latest();

            return $query->paginate(9); // الباجينيشن
        });

        // Ajax response
        if ($request->ajax()) {
            $returnHTML = view('frontend.pages.all-workers.worker.workers_page', compact('cvs'))->render();

            return response()->json([
                'success' => true,
                'html' => $returnHTML,
                'current_page' => $cvs->currentPage(),
                'last_page' => $cvs->lastPage(),
            ]);
        }

        // البيانات المطلوبة للفلترة
        $ages = Cache::rememberForever('ages', fn() => AgeRange::all());
        $jobs = Cache::rememberForever('jobs', fn() => Job::all());
        $religions = Cache::rememberForever('religions', fn() => Religion::all());
        $social_types = Cache::rememberForever('social_types', fn() => SocialType::all());
        $nationalities = Cache::rememberForever('countries', fn() =>
            Nationalitie::orderByRaw('CASE WHEN id = 7 THEN 0 ELSE 1 END')->get()
        );

        return view('frontend.pages.all-workers.all-workers', compact(
            'ages','jobs','nationalities','cvs','religions','social_types'
        ));
    }



    public function completeTheRecruitmentRequest($id , Request $request)
    {
        $cv = Biography::findOrFail($id);
        if ($cv->status != 'new') {
            return response([], 400);
        }

        $order_data = [
            'user_id' => auth()->user()->id,
            'status' => "under_work",
            "admin_id" => $request->customerSupport,
            'order_date' => now()
        ];

        $this->sendSMS( auth()->user()->phone, 'لقد قمت بطلب استقدام جديد ');
        $msg =   " عزيزى الموظف " . " قام العميل " . auth()->user()->name . " رقم جواله " . auth()->user()->phone . " \nبحجز السيرة الذاتية الاتية " . $cv->name;
        $admin=Admin::find($request->customerSupport);

        if(!empty($admin->phone)) {
            $this->sendSMS($admin->phone, $msg);
        }
        Biography::where('id', $id)->update($order_data);
        $order_data['biography_id'] = $cv->id;
        $order_data['order_code'] = "NK" . $cv->id . time();
        Order::create($order_data);
        return response(['order_code' => $order_data['order_code']], 200);
    }//end fun


    public function show_worker_details(Request $request, $id)
    {
        $branch = $request->cookie('branch');
        $cv = Biography::with('recruitment_office','nationalitie','language_title',
            'religion','job','social_type','admin','images','skills')
            ->where('id',$id)
            ->firstOrFail();
        /*$admins = \App\Models\Admin::where('admin_type','!=',0)->where(function($q) use ($branch) {
                    $q->where('branch', $branch)
                    ->orWhere('branch', 'all_branches');
                })->take(12)->get();*/
            /*$admins = \App\Models\Admin::where('admin_type', '!=', 0)
            ->where(function($q) use ($branch) {
                $q->where('branch', $branch)
                ->orWhere('branch', 'all_branches')
                ->orWhere(function($q2) use ($branch) {
                    if ($branch === 'riyadh') {
                        $q2->whereIn('branch', ['r_y', 'j_r']);
                    } elseif ($branch === 'jeddah') {
                        $q2->whereIn('branch', ['y_j', 'j_r']);
                    } elseif ($branch === 'yanbu') {
                        $q2->whereIn('branch', ['r_y', 'y_j']);
                    }
                });
            })
            ->take(12)
            ->get();*/
        $admins = Cache::rememberForever("admins", function() use ($branch) {
            return \App\Models\Admin::where('admin_type', '!=', 0)
                ->where(function($q) use ($branch) {
                    $q->where('branch', $branch)
                    ->orWhere('branch', 'all_branches')
                    ->orWhere(function($q2) use ($branch) {
                        if ($branch === 'riyadh') {
                            $q2->whereIn('branch', ['r_y', 'j_r']);
                        } elseif ($branch === 'jeddah') {
                            $q2->whereIn('branch', ['y_j', 'j_r']);
                        } elseif ($branch === 'yanbu') {
                            $q2->whereIn('branch', ['r_y', 'y_j']);
                        }
                    });
                })
                ->take(12)
                ->get();
        });
        $returnHTML = view("frontend.pages.all-workers.worker.worker_details")
            ->with(['cv'=>$cv,'admins'=>$admins])
            ->render();
        return response()->json(array('success' => true, 'html'=>$returnHTML));
    }//end fun



    public function custom_worker_request_view()
    {
        /*$nationalities = Nationalitie::get();
        $jobs = Job::get();
        $ages = AgeRange::get();
        $social_types = SocialType::get();
        $religions = Religion::get();
        $languages = LanguageTitle::get();
        $cities = City::get();*/

        $nationalities = Cache::rememberForever('countries', fn() => Nationalitie::get());
        $jobs = Cache::rememberForever('jobs', fn() => Job::get());
        $ages = Cache::rememberForever('ages', fn() => AgeRange::get());
        $social_types = Cache::rememberForever('social_types', fn() => SocialType::get());
        $religions = Cache::rememberForever('religions', fn() => Religion::get());
        $languages = Cache::rememberForever('languages', fn() => LanguageTitle::get());
        $cities = Cache::rememberForever('cities', fn() => City::get());

        return view('frontend.pages.recruitment-request.recruitment-request',[
            'nationalities'=>$nationalities,
            'jobs'=>$jobs,
            'ages'=>$ages,
            'social_types'=>$social_types,
            'religions'=>$religions,
            'languages'=>$languages,
            'cities'=>$cities,
        ]);
    }

    public function makeCustomRecruitmentRequest(CustomWorkerRequest $request)
    {

        $user = User::create([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'city_id'=>$request->city_id,
            'type'=>'employer',
        ]);

        Biography::create([
            'user_id'=>$user->id,
            'status'=>"under_work",
            'order_type'=>"special",
            'tfeez_number'=>$request->tfeez_number,
            'nationalitie_id'=>$request->nationalitie_id,
            'job_id'=>$request->job_id,
            'order_of_age_id'=>$request->order_of_age_id,
            'social_type_id'=>$request->social_type_id,
            'religion_id'=>$request->religion_id,
            'language_title_id'=>$request->language_title_id,
            'type_of_experience'=>$request->type_of_experience,
            'special_requirement'=>$request->special_requirement,
            'order_date'=>now(),
        ]);

        return response()->json([],200);
    }//end fun

    public function show(Request $request, $id){

        $branch = $request->cookie('branch');
        $cv = Biography::with('recruitment_office','nationalitie','language_title',
            'religion','job','social_type','admin','images','skills')
            ->where('id',$id)
            ->firstOrFail();
        /*$admins = \App\Models\Admin::where('admin_type','!=',0)->where(function($q) use ($branch) {
                    $q->where('branch', $branch)
                    ->orWhere('branch', 'all_branches');
                })->take(12)->get();*/
            /*$admins = \App\Models\Admin::where('admin_type', '!=', 0)
            ->where(function($q) use ($branch) {
                $q->where('branch', $branch)
                ->orWhere('branch', 'all_branches')
                ->orWhere(function($q2) use ($branch) {
                    if ($branch === 'riyadh') {
                        $q2->whereIn('branch', ['r_y', 'j_r']);
                    } elseif ($branch === 'jeddah') {
                        $q2->whereIn('branch', ['y_j', 'j_r']);
                    } elseif ($branch === 'yanbu') {
                        $q2->whereIn('branch', ['r_y', 'y_j']);
                    }
                });
            })
            ->take(12)
            ->get();*/
        $admins = Cache::rememberForever("admins", function() use ($branch) {
            return \App\Models\Admin::where('admin_type', '!=', 0)
                ->where(function($q) use ($branch) {
                    $q->where('branch', $branch)
                    ->orWhere('branch', 'all_branches')
                    ->orWhere(function($q2) use ($branch) {
                        if ($branch === 'riyadh') {
                            $q2->whereIn('branch', ['r_y', 'j_r']);
                        } elseif ($branch === 'jeddah') {
                            $q2->whereIn('branch', ['y_j', 'j_r']);
                        } elseif ($branch === 'yanbu') {
                            $q2->whereIn('branch', ['r_y', 'y_j']);
                        }
                    });
                })
                ->take(12)
                ->get();
        });
       return view("frontend.pages.all-workers.worker.worker_details",compact('cv','admins'));

    }


//    private function sendSms($phone,$msg){
//        $phone='966'.$phone;
//
//
//
//        $ch = curl_init(config('msegat.msegat_url'));
//        $data = array(
//            'userName'=>config('msegat.userName'),
//            'apiKey' => config('msegat.apiKey'),
//            'numbers' => $phone,
//            'userSender' => config('msegat.userSender'),
//            'msgEncoding' => config('msegat.msgEncoding'),
//            'msg' => $msg
//        );
//
//
//        $result = Http::withOptions([
//            'verify' => false,
//        ])->post(config('msegat.msegat_url'),$data);
//
//
////        curl_setopt($ch, CURLOPT_POST, 1);
////        //Attach our encoded JSON string to the POST fields.
////        curl_setopt($ch, CURLOPT_POSTFIELDS, $response_data);
////        //Set the content type to application/json
////        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
////        //Execute the request
////        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
////
////        $result = curl_exec($ch);
//        return $result;
//    }






}//end class
