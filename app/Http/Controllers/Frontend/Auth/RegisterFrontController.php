<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\Auth\RegisterRequest;
use App\Http\Traits\Upload_Files;
use App\Models\User;
use App\Services\SMS\MesgatSMS;
use Illuminate\Http\Request;
use TaqnyatSms;
class RegisterFrontController extends Controller
{

    use Upload_Files;
    use MesgatSMS;

    public function register_view($id='')
    {
        if (auth()->check()) {
            toastr()->error(__('frontend.errorMessageAuth'),__('frontend.errorTitleAuth'));
            return redirect()->back();
        }
        return view('frontend.pages.auth.register.register',compact('id'));
    }//end fun


    public function check_phone_to_send_otp(RegisterRequest $request)
    {

         if ($this->check_if_phone_exist_or_not() == "phone_exists") {
          return response()->json([],403);
         }

        $code = $this->sendOTP($request->phone);
        return response()->json($code,200);
    }//end fun


    public function register_action(RegisterRequest $request)
    {
        $number=$request->password;
        $numlength = strlen((string)$number);

        if($numlength==10){
            $number=$request->password;
            $number = substr($number, 1);
            $request->password=$number;
        }

        // if ($this->check_if_phone_exist_or_not() == "phone_exists") {
        //     return response()->json([],403);
        // }
        $data = $request->validated();

        $phone = ltrim($request->phone, '0');

        // فحص التكرار
        if (User::where('phone', $phone)->exists()) {
            return response()->json([
                'status' => 'error',
                'message' => 'رقم الجوال مسجل مسبقًا'
            ], 409, ['Content-Type' => 'application/json']);
        }

        // إزالة أي حقل غير موجود في جدول users
        unset($data['code']);
        //$data['logo'] = $this->upload_image_or_make_new_image($request->logo , substr($request->name, 0, 2) );
        $data['logo'] = NULL;
        if(isset($request->code) && !empty($request->code)){
          $data['phone_activation_code'] = $request->code;
        }else{
            $data['phone_activation_code'] = 1234;
        }
        $data['activated_at'] = now();
        $number=$data['phone'];
        $numlength = strlen((string)$data['phone']);

        if($numlength==10) {
            $data['phone'] = substr($number, 1);
        }
        $user = User::create($data);
        auth()->login($user);
        if ($request->id!=''){
            return response()->json(["user"=>$user],415);
        }
        return response()->json(["user"=>$user],200);
    }//end fun

    /*public function register_action(RegisterRequest $request)
    {
        $number=$request->password;
        $numlength = strlen((string)$number);

        if($numlength==10){
            $number=$request->password;
            $number = substr($number, 1);
            $request->password=$number;
        }

        // if ($this->check_if_phone_exist_or_not() == "phone_exists") {
        //     return response()->json([],403);
        // }
        $data = $request->validated();
        //$data['logo'] = $this->upload_image_or_make_new_image($request->logo , substr($request->name, 0, 2) );
        $data['logo'] = NULL;
        $data['phone_activation_code'] = $request->code;
        $data['activated_at'] = now();
        $number=$data['phone'];
        $numlength = strlen((string)$data['phone']);

        if($numlength==10) {
            $data['phone'] = substr($number, 1);
        }
        $user = User::create($data);
        auth()->login($user);
        if ($request->id!=''){
            return response()->json(["user"=>$user],415);
        }
        return response()->json(["user"=>$user],200);
    }//end fun




    /**
     * @return string
     *
     * check if phone not exists
     */
    private function check_if_phone_exist_or_not()
    {
        $user = User::where([
            'phone'=>request()->phone,
            'type'=>'normal_user',
        ])->first();
        if ($user) {
            return "phone_exists";
        }
        return "phone_not_exists";
    }//end fun


    /**
     * @param $image
     * @param $name
     * @return mixed|string|null
     *
     * upload image or generate image
     */
    private function upload_image_or_make_new_image($image , $name)
    {
        if ($image) {
            return $this->uploadFiles('users',$image,'');
        }
        return $this->createImageFromTextManual('users' , $name ,256 , '#000', '#fff');
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

        $phone='966'.$phone;

        $taqnyt->sendMsg($msg, $phone, $sender, $smsId);



        return $code;


    }//end fun

}//end class
