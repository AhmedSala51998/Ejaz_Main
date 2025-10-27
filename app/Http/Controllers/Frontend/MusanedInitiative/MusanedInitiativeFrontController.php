<?php

namespace App\Http\Controllers\Frontend\MusanedInitiative;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MusanedInitiativeFrontController extends Controller
{
    //
    public function index(){
        return view('frontend.pages.musanedInitiative.index');

    }
}
