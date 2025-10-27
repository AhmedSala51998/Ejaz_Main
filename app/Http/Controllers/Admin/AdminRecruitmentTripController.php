<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RecruitmentTrip;
use Illuminate\Http\Request;

class AdminRecruitmentTripController extends Controller
{
    //
    public function index(){
        if (!checkPermission(29))
            return view('admin.permission');
        $trip=RecruitmentTrip::first();
        return view('admin.recruitmentTrip.index',compact('trip'));
    }
    public function updateRecruitmentTrip(Request $request){
        if (!checkPermission(30))
            return view('admin.permission');
        $validator=\Validator::make($request->all(),
            [
                'recruitment_contract_title'=>'required',
                'recruitment_contract_desc'=>'required',
                'recruitment_trip_title'=>'required',
                'recruitment_trip_desc'=>'required',
                'employment_arrival_title'=>'required',
                'employment_arrival_desc'=>'required',
                'customers_service_title'=>'required',
                'customers_service_desc'=>'required'
            ]);
        if ($validator->fails()) {
            return response()->json(['status'=>'error','errors'=>$validator->errors()]);
        }
        $trip=RecruitmentTrip::first();

        $trip->update([
            'recruitment_contract_title'=>$request->recruitment_contract_title,
            'recruitment_contract_desc'=>$request->recruitment_contract_desc,
            'recruitment_trip_title'=>$request->recruitment_trip_title,
            'recruitment_trip_desc'=>$request->recruitment_trip_desc,
            'employment_arrival_title'=>$request->employment_arrival_title,
            'employment_arrival_desc'=>$request->employment_arrival_desc,
            'customers_service_title'=>$request->customers_service_title,
            'customers_service_desc'=>$request->customers_service_desc,

        ]);


        return response()->json(['status'=>true]);

    }
}
