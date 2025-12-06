<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\SMS\MesgatSMS;
use Carbon\Carbon;
use Illuminate\Http\Request;
use TaqnyatSms;

class ForgetPasswordFrontController extends Controller
{

    use MesgatSMS;

    public function forget_password_view($id='')
    {
        if (auth()->check()) {
            toastr()->error(__('frontend.errorMessageAuth'),__('frontend.errorTitleAuth'));
            return redirect()->back();
        }
        return view('frontend.pages.auth.forgetPassword.forgetPassword',compact('id'));
    }//end fun



    public function forget_password_action(Request $request)
    {
        $user = User::where('phone',$request->phone)->first();
        if (!$user) {
            return response()->json([],400);
        }
        $cv_id = $request->id ?? null;
        $user = $this->make_token_for_confirm_phone($user);
        //send reset password
        $this->sent_link_of_reset_password($user , $cv_id);
        return response()->json(["user"=>$user],200);
    }



    public function forget_password_email_successfully_sent()
    {
        if (auth()->check()) {
            toastr()->error(__('frontend.errorMessageAuth'),__('frontend.errorTitleAuth'));
            return redirect()->back();
        }
        return view('frontend.pages.auth.forgetPassword.forget-password-link-sent-successfully');
    }

    private function make_token_for_confirm_phone($user)
    {
        $user->token = md5($user->id.time());
        $user->confirm_link_expire = Carbon::parse(date("d-m-Y H:i:s"))->addHour();
        $user->save();
        return $user;
    }


    private function sent_link_of_reset_password($user, $cv_id = null)
    {
        $bearer = '2a17275dc72bdb4bd16a93eaf6f6530e';
        $taqnyt = new TaqnyatSms($bearer);


        $url = route('auth.reset_password_view')."?token=".$user->token;

        if ($cv_id) {
            $url .= "&cv_id=" . $cv_id;
        }

        $msg = "يمكنك إعادة تعيين كلمة المرور من خلال هذا الرابط : $url ";


        $sender = 'Ejazrec';
        $smsId = '25489';

        $phone=$user->phone;

        $taqnyt->sendMsg($msg, $phone, $sender, $smsId);


//        $url = route('auth.reset_password_view')."?token=".$user->token;
//
//        $msg = "يمكنك إعادة تعيين كلمة المرور من خلال هذا الرابط : $url ";
//        // if (env('SMS_Work')== 'work') {
//            $this->sendSMS($user->phone, $msg);
//        // }
    }

}//end class
