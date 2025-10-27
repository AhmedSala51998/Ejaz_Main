<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrdersCollection;
use App\Http\Resources\WorkersCollection;
use App\Models\AgeRange;
use App\Models\Biography;
use App\Models\Contact;
use App\Models\Job;
use App\Models\Nationalitie;
use App\Models\Order;
use App\Models\User;
use App\Services\SMS\MesgatSMS;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\PDF;
use App\Models\RecruitmentTrip;

class ApiHomeController extends Controller
{
    use MesgatSMS;
    public function getRequestInfo(Request $request)
    {
        $nationalities = Nationalitie::get()->pluck('id', 'title');

        $admins = \App\Models\Admin::where('admin_type', '!=', 0)->pluck('whats_up_number', 'name');
        //        $admins_array=[];
        //        foreach ($admins as $key=>$val){
        //            $admins_array[$val->id]['name']=$val->name;
        //            $admins_array[$val->id]['']=$val->name;
        //
        //        }

        return response()->json([
            'success' => true,
            'nationalities' => $nationalities,
            'admins' => $admins,
        ]);
    }

    public function workers(Request $request)
    {

        $cvs = Biography::where('status', 'new')
            ->where('order_type', 'normal')
            ->FilterByAge($request->age)
            ->FilterByJob($request->job)
            ->FilterByNationality($request->nationality)->where('type', 'admission')
            ->with(
                'recruitment_office',
                'nationalitie',
                'language_title',
                'religion',
                'job',
                'social_type',
                'admin',
                'images',
                'skills'
            )
            ->latest()

            ->paginate(2);


        return new WorkersCollection($cvs);
    }
    public function transferService(Request $request)
    {
        $cvs = Biography::where('status', 'new')
            ->where('order_type', 'normal')
            ->FilterByAge($request->age)
            ->FilterByJob($request->job)
            ->FilterByNationality($request->nationality)->where('type', 'transport')
            ->with(
                'recruitment_office',
                'nationalitie',
                'language_title',
                'religion',
                'job',
                'social_type',
                'admin',
                'images',
                'skills'
            )->where('type', 'transport')
            ->latest()
            ->paginate(2);
        return new WorkersCollection($cvs);
    }
    public function send_code_phone_exit(Request $request)
    {
        if ($request->phone) {
            //            ALTER TABLE `users` ADD `check_phone_api` VARCHAR(256) NULL AFTER `phone_code`;
            $phone =  str_replace("+966 ", '', $request->phone);

            $check_user = User::where('phone', $phone)->first();
            if (!empty($check_user)) {
                //   $code="1234";
                if (env('SMS_Work') == 'work') {
                    $code = rand(1111, 9999);
                    $this->sendSMS($request->phone, "كود التحقق هو $code");
                }

                $check_user->check_phone_api = $code;
                $check_user->save();
                return response()->json(['success' => true, "code" => $code], 200);
            } else {
                return response()->json(['success' => false, 'msg' => 'عزيزي العميل رقم الجوال المرسل غير موجد لدينا في الموقع الالكتروني يمكننا مساعدتكم من خلال الاتي '], 400);
            }
        }
    }
    public function verfiy_phone(Request $request)
    {
        $phone =  str_replace("+966 ", '', $request->phone);
        $regex = "/^(05)[0-9]{8}$|^(5)[0-9]{8}$/";
        if (!preg_match($regex, $phone)) {
            return response()->json([
                'success' => false,
                'msg' => 'رقم الجوال غير صحيح'
            ], 400);
        } else {
            $user = User::where([
                'phone' => $phone,
                'type' => 'normal_user',
            ])->first();

            if (!empty($user)) {
                return response(['success' => false, "msg" => " نأسف رقم الهاتف مسجل لدينا بالموقع رجاء ادخال رقم جديد "], 400);
            } else {

                return response()->json(['success' => true, 'msg' => "ادخل رقم هاتفك على الصيغة التالية لاستكمال طلبك"]);
            }
        }
    }
    public function send_code(Request $request)
    {
        $phone =  str_replace("+966 ", '', $request->phone);
        $regex = "/^(05)[0-9]{8}$|^(5)[0-9]{8}$/";
        if (!preg_match($regex, $phone)) {
            return response()->json([
                'success' => false,
                'msg' => 'رقم الجوال غير صحيح'
            ], 400);
        }

        if ($request->phone) {
            //            ALTER TABLE `users` ADD `check_phone_api` VARCHAR(256) NULL AFTER `phone_code`;



            // $check_user = User::where('phone', $phone)->first();
            // if (!empty($check_user)){
            //  $code="1234";
            if (env('SMS_Work') == 'work') {
                $code = rand(1111, 9999);
                $this->sendSMS($phone, "كود التحقق هو $code");

                //      $code;
            }

            // $check_user->check_phone_api=$code;
            // $check_user->save();
            return response()->json(['success' => true, 'msg' => "عزيزي العميل يرجي تزويدنا في رقم التحقق التي ارساله الي (رقم الجوال ) ", "code" => $code], 200);
        } else {
            return response()->json(['success' => false, 'msg' => 'رقم الجوال لم يرسل '], 400);
        }
    }
    public function completeTheRecruitmentRequest_2($id, Request $request)
    {
        $cv = Biography::find($id);
        if (!$cv) {
            return jsonSuccess(["id" => $id], __('api.not found'), 404);
        }
        if ($cv->status != 'new') {
            return jsonSuccess(["id" => $id], "تم الحجز بالفعل من قبل شخص اخر", 404);
        }


        $order_data = [
            'user_id' => auth("api")->user()->id,
            'status' => "under_work",
            "admin_id" => $request->customerSupport,
            'order_date' => now()
        ];

        // $this->sendSMS( auth('api')->user()->phone, 'لقد قمت بطلب استقدام جديد ');
        $msg =   " عزيزى الموظف " . " قام العميل " . auth('api')->user()->name . " رقم جواله " . auth('api')->user()->phone . " \nبحجز السيرة الذاتية الاتية " . $cv->name;
        $admin = Admin::find($request->customerSupport);

        if (!empty($admin->phone)) {
            // $this->sendSMS($admin->phone, $msg);
        }
        Biography::where('id', $id)->update($order_data);
        $order_data['biography_id'] = $cv->id;
        $order_data['order_code'] = "NK" . $cv->id . time();
        Order::create($order_data);
        return response(['success' => true, "msg" => "تم تنفيذ طلبك بنجاح"], 200);
    } //end fun

    public function completeTheRecruitmentRequest(Request $request)
    {


        $cv = Biography::where('passport_number', $request->cv)->first();
        $phone =  str_replace("+966 ", '', $request->phone);

        if ($cv->status != 'new') {
            return response(['success' => false, "نأسف لا يمكن اتمام طلبك الان"], 400);
        }

        $user = User::where([
            'phone' => $phone,
            'type' => 'normal_user',
        ])->first();

        if (!empty($user)) {
            return response(['success' => false, "msg" => " نأسف رقم الهاتف مسجل لدينا بالموقع رجاء ادخال رقم جديد "], 400);
        }

        $use_data = [
            'phone_code' => $request->code,
            'phone' => $phone,
            "name" => $request->name,

        ];

        $user = User::create($use_data);
        $admin = Admin::where('whats_up_number', $request->whats_up_number)->first();

        $order_data = [
            'user_id' => $user->id,
            'status' => "under_work",
            "admin_id" => $admin->id,
            'order_date' => now()
        ];

        $this->sendSMS($user->phone, 'لقد قمت بطلب استقدام جديد ');
        $msg =   " عزيزى الموظف " . " قام العميل " . $user->name . " رقم جواله " . $user->phone . " \nبحجز السيرة الذاتية الاتية " . $cv->name;
        // $admin=Admin::find($request->customerSupport);

        if (!empty($admin->phone)) {
            $this->sendSMS($admin->phone, $msg);
        }
        Biography::where('id', $cv->id)->update($order_data);
        $order_data['biography_id'] = $cv->id;
        $order_data['order_code'] = "NK" . $cv->id . time();
        Order::create($order_data);
        return response(['success' => true, "msg" => "تم تنفيذ طلبك بنجاح"], 200);
    } //end fun
    public function verify_code(Request $request)
    {
        if ($request->phone) {
            //            ALTER TABLE `users` ADD `check_phone_api` VARCHAR(256) NULL AFTER `phone_code`;

            $phone =  str_replace("+966 ", '', $request->phone);
            $check_user = User::where('phone', $phone)->first();

            // if ($check_user->check_phone_api == $request->code ){
            $ordersHistory = Order::where(['user_id' => $check_user->id])
                ->whereIn('status', ['under_work', 'visa', 'traning', 'musaned', 'contract', 'finished', 'canceled'])
                ->whereHas('admin', function ($q) {
                    $q->where('id', '!=', null);
                })
                ->whereHas('biography', function ($q) {
                    $q->where('id', '!=', null);
                })->with(
                    'admin',
                    'biography',
                    'biography.recruitment_office',
                    'biography.nationalitie',
                    'biography.language_title',
                    'biography.religion',
                    'biography.job',
                    'biography.social_type',
                    'biography.images',
                    'biography.skills'
                )
                ->latest()
                ->get();
            if (!empty($ordersHistory)) {
                return new OrdersCollection($ordersHistory);
                // }
                // else{
                //     return response()->json(['success' => false, 'msg' => 'عزيزي العميل رقم التحقق غير صحيح  يمكننا مساعدتكم من خلال الاتي '], 400);

                // }
            } else {
                return response()->json(['success' => false, 'msg' => 'عزيزى العميل لا يوجد لك طلبات حتى الأن.يمكننا مساعدتك من خلال الاتى'], 400);
            }
        }
    }


    public function contact_us_action(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'subject' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ]);
        if (!empty($request->phone)) {
            $data['phone'] =  str_replace("+966 ", '', $request->phone);
        }
        Contact::create($data);
        return response()->json(['success' => true], 200);
    } //end fun


    public function getClientOrders(Request $request)
    {

        if ($request->contact_num) {
            $order = Order::where('contact_num', $request->contact_num)->first();

            if (!empty($order)) {
                $currentOrders = Order::where([
                    'contact_num' => $request->contact_num,

                ])->whereHas('admin', function ($q) {
                    $q->where('id', '!=', null);
                })
                    ->whereHas('biography', function ($q) {
                        $q->where('id', '!=', null);
                    })
                    ->with(
                        'admin',
                        'biography',
                        'biography.recruitment_office',
                        'biography.nationalitie',
                        'biography.language_title',
                        'biography.religion',
                        'biography.job',
                        'biography.social_type',
                        'biography.images',
                        'biography.skills'
                    )
                    ->latest()
                    ->get();
                return new OrdersCollection($currentOrders);
            } else {
                return response()->json(['success' => false, 'msg' => 'ﻻ يوجد طلب استقدام برقم العقد يمكننى مساعدتك من خلال الاتى'], 400);
            }
        } else {
            return response()->json(['success' => false, 'msg' => 'برجاء ارسل رقم العقد الخاص بطلب الاستقدام  لدينا'], 400);
        }
    } //end fun

    public function forget_password_view()
    {
        if (auth('api')->check()) {
            toastr()->error(__('frontend.errorMessageAuth'), __('frontend.errorTitleAuth'));
            return redirect()->back();
        }
        return view('frontend.pages.auth.forgetPassword.forgetPassword');
    } //end fun



    public function forget_password_action(Request $request)
    {
        $user = User::where('phone', $request->phone)->first();
        if (!$user) {
            return response()->json([], 400);
        }
        $user = $this->make_token_for_confirm_phone($user);
        //send reset password
        $this->sent_link_of_reset_password($user);
        return response()->json(["user" => $user], 200);
    }



    public function forget_password_email_successfully_sent()
    {
        if (auth('api')->check()) {
            toastr()->error(__('frontend.errorMessageAuth'), __('frontend.errorTitleAuth'));
            return redirect()->back();
        }
        return view('frontend.pages.auth.forgetPassword.forget-password-link-sent-successfully');
    }

    private function make_token_for_confirm_phone($user)
    {
        $user->token = md5($user->id . time());
        $user->confirm_link_expire = Carbon::parse(date("d-m-Y H:i:s"))->addHour();
        $user->save();
        return $user;
    }


    private function sent_link_of_reset_password($user)
    {
        $url = route('auth.reset_password_view') . "?token=" . $user->token;
        $msg = "يمكنك إعادة تعيين كلمة المرور من خلال هذا الرابط : $url ";
        if (env('SMS_Work') == 'work') {
            $this->sendSMS($user->phone, $msg);
        }
    }

    public function RecruitmentContractFront()
    {
        $pdf=PDF::first();
        $recruitmentTrip = RecruitmentTrip::first();
        return response()->json(['data' =>  ['recruitmentTrip' => $recruitmentTrip , 'pdf' => $pdf], 'msg' => null], 200);
    }
    public function ageRange()
    {
              $ages = AgeRange::get();  
            return response()->json(['data' =>  ['age_range' => $ages ], 'msg' => null, 'code' => 200], 200);
    }
}//end class
