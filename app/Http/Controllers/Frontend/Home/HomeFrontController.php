<?php

namespace App\Http\Controllers\Frontend\Home;

use App\Http\Controllers\Controller;
use App\Models\Biography;
use App\Models\Contact;
use App\Models\FrequentlyQuestion;
use App\Models\Nationalitie;
use App\Models\OurService;
use App\Models\Slider;
use App\Models\Sponsor;
use App\Models\Statistic;
use Illuminate\Http\Request;

class HomeFrontController extends Controller
{

    /*public function detectCityAjax(Request $request){

        if($request->has('branch')){
            $branch = $request->branch;
        } else {
            $lat = $request->lat;
            $lng = $request->lng;

            if(!$lat || !$lng){
                $ip = $request->ip();
                try {
                    $location = geoip($ip);
                    $lat = $location->lat;
                    $lng = $location->lon;
                } catch (\Exception $e){
                    $lat = 24.7136;
                    $lng = 46.6753;
                }
            }

            $cities = [
                'jeddah' => ['lat'=>21.4858, 'lng'=>39.1925],
                'yanbu'  => ['lat'=>24.0890, 'lng'=>38.0617],
                'riyadh' => ['lat'=>24.7136, 'lng'=>46.6753],
            ];

            $closestCity = null;
            $minDistance = INF;

            foreach($cities as $city => $coords){
                $dist = $this->getDistance($lat,$lng,$coords['lat'],$coords['lng']);
                if($dist < $minDistance){
                    $minDistance = $dist;
                    $closestCity = $city;
                }
            }

            $branch = $closestCity;
        }

        $minutesUntil2090 = (int)((strtotime('2090-12-31 23:59:59') - time()) / 60);

        return response()->json(['closestCity' => $closestCity])
            ->cookie('branch', $closestCity, $minutesUntil2090);


    }*/

    public function detectCityAjax(Request $request)
    {
        \Log::info('detectCityAjax called', ['request' => $request->all()]);

        if ($request->has('branch')) {
            $branch = $request->branch;
            \Log::info('Branch sent in request', ['branch' => $branch]);
        } else {
            $lat = $request->lat;
            $lng = $request->lng;
            \Log::info('No branch sent, received coordinates', ['lat' => $lat, 'lng' => $lng]);

            if (!$lat || !$lng) {
                $ip = $request->ip();
                \Log::info('No coordinates, trying to detect from IP', ['ip' => $ip]);
                try {
                    $location = geoip($ip);
                    $lat = $location->lat;
                    $lng = $location->lon;
                    \Log::info('GeoIP detected location', ['lat' => $lat, 'lng' => $lng]);
                } catch (\Exception $e) {
                    \Log::error('GeoIP failed', ['exception' => $e->getMessage()]);
                    $lat = 24.7136;
                    $lng = 46.6753;
                    \Log::info('Defaulting to Riyadh coordinates', ['lat' => $lat, 'lng' => $lng]);
                }
            }

            $cities = [
                'jeddah' => ['lat'=>21.4858, 'lng'=>39.1925],
                'yanbu'  => ['lat'=>24.0890, 'lng'=>38.0617],
                'riyadh' => ['lat'=>24.7136, 'lng'=>46.6753],
            ];

            $closestCity = null;
            $minDistance = INF;

            foreach($cities as $city => $coords){
                $dist = $this->getDistance($lat,$lng,$coords['lat'],$coords['lng']);
                \Log::info('Distance check', ['city' => $city, 'distance' => $dist]);
                if($dist < $minDistance){
                    $minDistance = $dist;
                    $closestCity = $city;
                }
            }

            $branch = $closestCity;
            \Log::info('Closest city determined', ['closestCity' => $branch]);
        }

        try {

            $minutesUntil2090 = (int)((strtotime('2090-12-31 23:59:59') - time()) / 60);

            /*return response()->json([
                'closestCity' => $branch
            ])->cookie('branch', $branch, $minutesUntil2090);*/
            return response()->json(['closestCity' => $branch])
                ->cookie('branch', $branch, $minutesUntil2090, '/', null, true, true, false, 'None');



        } catch (\Exception $e) {
            \Log::error('Failed to return response', ['exception' => $e->getMessage()]);
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /*public function detectCityAjax(Request $request)
    {
        \Log::info('detectCityAjax called', ['request' => $request->all()]);

        $lat = $request->lat;
        $lng = $request->lng;

        if (empty($lat) || empty($lng)) {
            $ip = $request->ip();
            \Log::info('No coordinates, using IP detection', ['ip' => $ip]);
            try {
                $location = geoip($ip);
                $lat = $location->lat;
                $lng = $location->lon;
            } catch (\Exception $e) {
                \Log::error('GeoIP failed', ['error' => $e->getMessage()]);
                $lat = 24.7136;
                $lng = 46.6753;
            }
        }

        $cities = [
            'jeddah' => ['lat' => 21.4858, 'lng' => 39.1925],
            'yanbu'  => ['lat' => 24.0890, 'lng' => 38.0617],
            'riyadh' => ['lat' => 24.7136, 'lng' => 46.6753],
        ];

        $closestCity = null;
        $minDistance = INF;

        foreach ($cities as $city => $coords) {
            $dist = $this->getDistance($lat, $lng, $coords['lat'], $coords['lng']);
            \Log::info('Distance', ['city' => $city, 'distance' => $dist]);
            if ($dist < $minDistance) {
                $minDistance = $dist;
                $closestCity = $city;
            }
        }

        \Log::info('Closest city determined', ['closestCity' => $closestCity]);

        $minutesUntil2090 = (int)((strtotime('2090-12-31 23:59:59') - time()) / 60);

        return response()->json(['closestCity' => $closestCity])
            ->cookie('branch', $closestCity, $minutesUntil2090);
    }*/

    private function getDistance($lat1,$lon1,$lat2,$lon2){
        $R = 6371;
        $dLat = deg2rad($lat2-$lat1);
        $dLon = deg2rad($lon2-$lon1);
        $a = sin($dLat/2)*sin($dLat/2)+cos(deg2rad($lat1))*cos(deg2rad($lat2))*sin($dLon/2)*sin($dLon/2);
        $c = 2*atan2(sqrt($a),sqrt(1-$a));
        return $R*$c;
    }

    public function index(Request $request)
    {
        $branch = $request->cookie('branch');
        if(!$branch){
            return view('frontend.pages.home.parts.landing');
        }else{

            $sliders = Slider::latest()->take(4)->get();
            $ourServices = OurService::take(5)->get();
            $statistics = Statistic::latest()->take(4)->get();
            $sponsors = Sponsor::latest()->take(5)->get();
            $questions = FrequentlyQuestion::take(100)->get();
            $countries=Nationalitie::latest()->get();
            $admins = \App\Models\Admin::where('admin_type','!=',0)->where('branch','=',$branch)->get();

            $cvs = Biography::where('status','new')
                ->where('order_type','normal')
                ->with('recruitment_office','nationalitie','language_title',
                'religion','job','social_type','admin','images','skills')
                ->take(5)->get();
            return view('frontend.pages.home.home',[
                'sliders'=>$sliders,
                'ourServices'=>$ourServices,
                'statistics'=>$statistics,
                'sponsors'=>$sponsors,
                'questions'=>$questions,
                'cvs'=>$cvs,
                'countries'=>$countries,
                'admins'=>$admins
            ]);
        }
    }//end fun



    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * Save Contact us
     *
     */
    public function contact_us_action(Request $request)
    {
        $data = $request->validate([
            'name'=>'required',
            'subject'=>'required',
            'phone'=>'required',
            'message'=>'required',
        ]);
        Contact::create($data);
        return response()->json([],200);
    }//end fun


}//end class
