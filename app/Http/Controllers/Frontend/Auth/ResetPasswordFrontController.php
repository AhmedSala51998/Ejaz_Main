<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use TaqnyatSms;
class ResetPasswordFrontController extends Controller
{


    public function reset_password_view(Request $request)
    {
        $token = $request->token;
        $cv_id = $request->cv_id ?? null;
        $user = User::where('token',$token)->first();
        if (is_null($token) || is_null($user) ||  strtotime($user->confirm_link_expire) < strtotime(Carbon::now())) {
            return view('frontend.pages.auth.resetPassword.reset-confirmation-link-failed');
        }
        return view('frontend.pages.auth.resetPassword.resetPassword',['user'=>$user,'cv_id' => $cv_id]);

    }//end fun


    public function reset_password_action(Request $request)
    {
        $request->validate([
            'password'=>'required',
            'confirm_password'=>'required',
        ]);

        $cv_id = $request->cv_id ?? null;

        $user = User::where('id',$request->id)->firstOrFail();
        $user->update(['password'=>$request->password,'token'=>null,'confirm_link_expire'=>null]);
        return response()->json(["cv_id" => $cv_id],200);
    }//end fun




}//end class
