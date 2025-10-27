<?php

namespace App\Http\Controllers\Frontend\Rental;

use App\Http\Controllers\Controller;
use App\Models\AgeRange;
use App\Models\Biography;
use App\Models\Job;
use App\Models\Nationalitie;
use App\Models\Religion;
use App\Models\SocialType;
use Illuminate\Http\Request;

class RentalController extends Controller
{

    /*public function rental(Request $request){
        $cvs = Biography::where('status','new')
            ->where('order_type','normal')
            ->FilterByAge($request->age)
            ->FilterByJob($request->job)
            ->FilterByNationality($request->nationality)->where('type','rental')
            ->with('recruitment_office','nationalitie','language_title',
                'religion','job','social_type','admin','images','skills')->where('type','rental')
            ->latest()
            ->paginate(3);
        $current_page = $cvs->currentPage() ;
        $last_page =  $cvs->lastPage();


        if ($request->ajax()) {
            $returnHTML = view('frontend.pages.all-workers.worker.workers_page',['rental'=>'rental'])
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
            'rental'=>'rental',
        ]);
    }*/

    public function rental(Request $request)
    {
        $query = Biography::where('status', 'new')
            ->where('order_type', 'normal')
            ->where('type', 'rental')
            ->where('is_blocked', 0)
            ->where('is_hide', 0)
            ->with('recruitment_office', 'nationalitie', 'language_title',
                'religion', 'job', 'social_type', 'admin', 'images', 'skills');

        $religions = Religion::all();
        $social_types = SocialType::all();

        // فلترة حسب الجنسية
        if ($request->nationality) {
            $query->where('nationalitie_id', $request->nationality);
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

        $cvs = $query->latest()->paginate(9);

        if ($request->ajax()) {
            $returnHTML = view('frontend.pages.all-workers.worker.workers_page', compact('cvs'))
                ->with(['rental' => 'rental'])->render();

            return response()->json([
                'success' => true,
                'html' => $returnHTML,
                'current_page' => $cvs->currentPage(),
                'last_page' => $cvs->lastPage(),
            ]);
        }

        $ages = AgeRange::all();
        $jobs = Job::all();
        $nationalities = Nationalitie::all();

        return view('frontend.pages.all-workers.all-workers', compact(
            'ages', 'jobs', 'nationalities', 'cvs', 'religions', 'social_types'
        ))->with(['rental' => 'rental']);
    }


}
