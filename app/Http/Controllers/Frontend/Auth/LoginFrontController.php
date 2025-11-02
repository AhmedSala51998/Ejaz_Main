<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginFrontController extends Controller
{


    public function login_view($id='')
    {
        if (auth()->check()) {
            toastr()->error(__('frontend.errorMessageAuth'),__('frontend.errorTitleAuth'));
            return redirect()->back();
        }
        return view('frontend.pages.auth.login.login',compact('id'));
    }//end fun


    public function login_action(Request $request)
    {
        $request->validate(['phone'=>'required', 'password'=>'required',]);
        //check auth
        $number=$request->phone;
        $numlength = strlen((string)$number);

        if($numlength==10) {
            $number= substr($number, 1);
        }
        if (auth()->attempt(['phone' =>$number, 'password' => request('password')], request('remember_me') == 1?true:false)) {
            $user = auth()->user();
            if ($user->is_blocked == "blocked") {
                auth()->logout();
                return response(['message'=>__('frontend.your account had blocked , please sent to support')],400);
            }
            if ($request->id!=''){
                return response()->json(['message'=>'data'],415);
            }
            return response(['message'=>'data'],200);
        }
        //invalid data
        return response(['message'=>'data'],500);
    }//end fun



}//end class
