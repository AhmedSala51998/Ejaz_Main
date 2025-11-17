<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Nationalitie;
use App\Models\OurService;
use Illuminate\Http\Request;

class CountriesController extends Controller
{
    public function index()
    {
        $countries=Nationalitie::latest()->get();
        /*$countries = Cache::rememberForever('countries', function() {
            return Nationalitie::latest()->get();
        });*/
        return view('frontend.pages.countries.countries',['countries'=>$countries]);
    }//end fun



}
