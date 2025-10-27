<?php

namespace App\Http\Controllers\Frontend\RecruitmentPolicy;

use App\Http\Controllers\Controller;
use App\Models\PDF;
use Illuminate\Http\Request;

class RecruitmentPolicyFrontController extends Controller
{

    public function index(){
        $pdf=PDF::first();
        return view('frontend.pages.recruitmentPolicy.index',compact('pdf'));

    }
}
