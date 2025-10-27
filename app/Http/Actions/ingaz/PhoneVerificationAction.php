<?php

namespace App\Http\Actions\ingaz;

use App\Http\Actions\MainAction;
use App\Http\Resources\Api\UserResource;
use App\Http\Traits\SendSMSTrait;
use App\Models\ingaz\PhoneVerification;
use App\Models\User;
use App\Services\SMS\MesgatSMS;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use TaqnyatSms;
use Tymon\JWTAuth\Facades\JWTAuth;

class PhoneVerificationAction extends MainAction
{
    // use SendSMSTrait;
    use MesgatSMS;

    public function __construct(PhoneVerification $model)
    {
        $this->model = $model;
        $this->fileFolder = 'images/PhoneVerification/';
    }

    public function storeSendCode($data,$request)
    {
        $phone_isset = $this->model->where('phone',$request->phone)->where('phone_code',$request->phone_code)->first();
        $user = User::where('phone',$request->phone)->where('phone_code',$request->phone_code)->first();

        if (isset($phone_isset) && isset($user)) {
            $code = '1234';
            if(env('MESSAGE_Live')) {
                $code = sprintf("%05d", rand(0, 9999));
            }
            $phone_isset->update([
                "code" => $code
            ]);
            $user->update([
                "phone_activation_code" => $code,
            ]);
            // رمز التحقق  : XXXX لخول منصة ussusalenjaz.sa
            $msg = "رمز التحقق  : $code  لدخول منصة ejaz.sa";
            $msg .= "\n";
            $phone = $request->phone;
            if (substr($phone, 0, 2) == '05') {
                $phone = ltrim($phone, '0');
            } elseif (substr($phone, 0, 3) == '966') {
                $phone = ltrim($phone, '966');
            }
            $phone = '966' . $phone;
            // $result = $this->sendSMS($request->phone, $msg);
            $code = $this->sendOTP($phone);
            $phone_isset->update([
                "code" => $code
            ]);
            $user->update([
                "phone_activation_code" => $code,
            ]);
            return ["code"=>$code];
        } else {

            $code = '1234';
            if(env('MESSAGE_Live')) {
                $code = sprintf("%05d", rand(0, 9999));
            }
            $data['code'] = $code;
            $user_data = $data;
            $user_data['phone_activation_code'] = $code;
            $code = $this->store($data);
            unset ($user_data['code']);
            $user_data['password'] = $request->password ;
            $user_data['name'] = $request->name ;
            $user = User::create($user_data);
            $msg = "رمز التحقق  : $code  لدخول منصة ejaz.sa";
            $msg .= "\n";
            $phone = $request->phone;
            if (substr($phone, 0, 2) == '05') {
                $phone = ltrim($phone, '0');
            } elseif (substr($phone, 0, 3) == '966') {
                $phone = ltrim($phone, '966');
            }
            $phone = '966' . $phone;
            // $result =$this->sendSMS($request->phone, $msg);
            $code = $this->sendOTP($phone);

            //dd($result);
            return ["code"=>$code];
        }
    }

    public function confirmCode($request)
    {

        $code_isset = $this->model->where('phone',$request->phone)
            // ->where('phone_code',$request->phone_code)
            ->where('code',$request->code)
            ->first();
        if (isset($code_isset)) {
            $user = User::where('phone',$request->phone)->first();
            if ($user) {
                Auth::guard('api')->login($user);
                $data['activated_at'] = now();
                $user->update(['activated_at' =>   now()]);
                $token = $this->generateToken();
                $user->token = $token;
                $users = UserResource::make($user);
                return jsonSuccess($users);
            }
            return jsonSuccess();
        } else {
            return false;
        }
    }

    protected function generateToken()
    {
        $user = auth()->user();
        $token = JWTAuth::fromUser($user);
        return $token;
    }

    public function updatePassword($request) {
        $user = User::find(Auth::user()->id);
        $user->update(['password' => $request->new_password]);
        return true;
    }

    public function sendOTP($phone)
    {
        $bearer = '2a17275dc72bdb4bd16a93eaf6f6530e';
        $taqnyt = new TaqnyatSms($bearer);


        $code = rand(1111,9999);
        $msg= "رمز التحقق : ". $code ."  للدخول الي منصة ejazrecruitment.sa ";

        $this->sendSMS($phone,$msg);

        $sender = 'Ejazrec';
        $smsId = '25489';

        $phone= $phone;

        $taqnyt->sendMsg($msg, $phone, $sender, $smsId);


        return $code;


    }//end fun
}
