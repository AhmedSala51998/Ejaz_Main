<?php

namespace App\Http\Controllers\Frontend\TransferServices;

use App\Http\Controllers\Controller;
use App\Models\AgeRange;
use App\Models\Biography;
use App\Models\Job;
use App\Models\Nationalitie;
use App\Models\Religion;
use App\Models\SocialType;
use Illuminate\Http\Request;

class TransferServicesFrontController extends Controller
{

    /*public function transferService(Request $request){
        $cvs = Biography::where('status','new')
            ->where('order_type','normal')
            ->FilterByAge($request->age)
            ->FilterByJob($request->job)
            ->FilterByNationality($request->nationality)->where('type','transport')
            ->with('recruitment_office','nationalitie','language_title',
                'religion','job','social_type','admin','images','skills')->where('type','transport')
            ->latest()
            ->paginate(3);
        $current_page = $cvs->currentPage() ;
        $last_page =  $cvs->lastPage();


        if ($request->ajax()) {
            $returnHTML = view('frontend.pages.all-workers.worker.workers_page',['transfer'=>'transfer'])
                ->with(['cvs' => $cvs])->render();
            return response()->json([
                'success' => true,
                'html' => $returnHTML,
                'current_page' => $current_page,
                'last_page' => $last_page,
            ]);
        }



        $ages = AgeRange::get();
        $jobs = Job::get();
        $nationalities = Nationalitie::get();

        return view('frontend.pages.all-workers.all-workers',[
            'ages'=>$ages,
            'jobs'=>$jobs,
            'nationalities'=>$nationalities,
            'cvs'=>$cvs,
            'current_page' => $current_page,
            'last_page' => $last_page,
            'transfer'=>'transfer',
        ]);
    }*/

    public function transferService(Request $request)
    {

        $query = Biography::where('status', 'new')
            ->where('order_type', 'normal')
            ->where('type', 'transport')
            ->where('is_blocked', 0)
            ->where('is_hide', 0)
            ->whereHas('nationalitie', function ($query) {
                $query->where('is_visible', 1);
            })
            ->with('recruitment_office', 'nationalitie', 'language_title',
                'religion', 'job', 'social_type', 'admin', 'images', 'skills');

        $religions = Religion::all();
        $social_types = SocialType::all();


        // فلترة حسب الجنسية
        /*if ($request->nationality) {
            $query->where('nationalitie_id', $request->nationality);
        }*/

        /*$countryNameAr = null;
        if ($request->nationality) {
            $country = Nationalitie::where('country_name_en', $request->nationality)->first();
            if ($country) {
                $query->where('nationalitie_id', $country->id);
                $countryNameAr = $country->country_name;
            }
        }*/

        $countryNameAr = null;

        if ($request->filled('nationality')) {
            $selectedCountry = $request->input('nationality');

            $country = Nationalitie::where(
                'country_name_en',
                $selectedCountry
            )->first();

            $isHidden = $country && (int) $country->is_visible !== 1;

            if (!$country || $isHidden) {
                $status = $country ? 503 : 404;

                if ($request->ajax()) {
                    $parameters = $request->query();

                    unset($parameters['page'], $parameters['_']);

                    $parameters['nationality'] = $selectedCountry;

                    $redirectUrl = $request->url()
                        . '?'
                        . http_build_query($parameters);

                    return response()->json([
                        'success' => false,
                        'show_country_error' => true,
                        'redirect_url' => $redirectUrl,
                    ], $status)->header('Cache-Control', 'no-store');
                }

                return response()
                    ->view('frontend.pages.errors.404', [
                        'countryTemporarilyUnavailable' => (bool) $isHidden,
                        'countryNameAr' => $country ? $country->country_name : null,
                    ], $status)
                    ->header('Cache-Control', 'no-store');
            }

            $query->where('nationalitie_id', $country->id);
            $countryNameAr = $country->country_name;
        }

        // باقي الفلاتر
        if ($request->age) {
            $query->FilterByAge($request->age);
        }

        if ($request->job) {
            $query->FilterByJob($request->job);
        }

        if ($request->religion) {
            $query->where('religion_id', $request->religion);
        }

        if ($request->social) {
            $query->where('social_type_id', $request->social);
        }

        $cvs = $query->latest()->paginate(3);


        if ($request->ajax()) {
            $returnHTML = view('frontend.pages.all-workers.worker.workers_page', compact('cvs'))
                ->with(['transfer' => 'transfer'])->render();

            return response()->json([
                'success' => true,
                'html' => $returnHTML,
                'current_page' => $cvs->currentPage(),
                'last_page' => $cvs->lastPage(),
            ]);
        }

        $ages = AgeRange::all();
        $jobs = Job::all();
        //$nationalities = Nationalitie::all();
        $nationalities = Nationalitie::where('is_visible', 1)->get();

        return view('frontend.pages.all-workers.all-workers', compact(
            'ages', 'jobs', 'nationalities', 'cvs', 'religions', 'social_types' , 'countryNameAr'
        ))->with(['transfer' => 'transfer']);
    }


}
