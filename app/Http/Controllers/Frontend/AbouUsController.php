<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Nationalitie;
use App\Models\OurService;
use Illuminate\Http\Request;

class AbouUsController extends Controller
{
    public function index()
    {

        return view('frontend.pages.aboutUs.aboutUs');
    }//end fun



}
