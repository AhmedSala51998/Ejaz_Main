<?php

namespace App\Http\Controllers\Frontend\Support;

use App\Http\Controllers\Controller;
use App\Models\FrequentlyQuestion;
use App\Models\Subject;
use Illuminate\Http\Request;

class SupportFrontController extends Controller
{
    //

    public function blogs(){
        return view('frontend.pages.blogs.index');

    }
    public function supports( Request $request){
        $questions = FrequentlyQuestion::take(100)->get();
        $subjects=Subject::take(10)->get();

        if($request->ajax()){

            $html=view('frontend.pages.support.parts.questions',compact('questions'))->render();
            return response()->json(['status'=>true,'html'=>$html]);

        }


        return view('frontend.pages.support.index',compact('questions','subjects'));

    }

    public function contactUs(){
        return view('frontend.pages.supportContactUs.index');

    }

}
