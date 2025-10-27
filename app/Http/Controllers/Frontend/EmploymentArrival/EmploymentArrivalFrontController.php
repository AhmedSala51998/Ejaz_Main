<?php

namespace App\Http\Controllers\Frontend\EmploymentArrival;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmploymentArrivalFrontController extends Controller
{
    //
    public function index(){
        return view('frontend.pages.employmentArrival.index');

    }
}
