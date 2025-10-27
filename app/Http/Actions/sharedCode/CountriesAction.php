<?php

namespace App\Http\Actions\sharedCode;



use App\Models\hr\Job;
use App\Http\Actions\MainAction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CountriesAction extends MainAction
{
    public function getCountries() {
        $countries = DB::table('countries')
                    ->join('countries_translations', 'countries.id', '=', 'countries_translations.country_id')
                    ->where('countries.deleted', 0)
                    ->where('countries_translations.locale', 'ar')
                    ->select('countries.id', 'countries_translations.name')
                    ->get();
        return $countries;
    }

}
