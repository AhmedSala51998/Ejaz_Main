<?php

namespace App\Http\Controllers\Frontend\RecruitmentContract;

use App\Http\Controllers\Controller;
use App\Models\RecruitmentTrip;
use Illuminate\Http\Request;

class RecruitmentContractFrontController extends Controller
{
     public function index(){
         $recruitmentTrip=RecruitmentTrip::first();
         return view('frontend.pages.recruitmentContract.index',compact('recruitmentTrip'));

     }
}
