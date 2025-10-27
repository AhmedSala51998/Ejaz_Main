<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Biography;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\RecruitmentOffice;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class AdminController extends Controller
{

    public function __construct()
    {

    }


    public function index(Request $request)
    {

        if (!checkPermission(1))
            return view('admin.permission');




        $year = date('Y');




        $janDay = date('Y-m-t', strtotime(date('Y-') . '01-01'));
        $janDate = ["$year-01-01", $janDay];


        $febDay = date('Y-m-t', strtotime(date('Y-') . '02-01'));
        $febDate = ["$year-02-01", $febDay];

        $marDay = date('Y-m-t', strtotime(date('Y-') . '03-01'));
        $marDate = ["$year-03-01", $marDay];

        $abrDay = date('Y-m-t', strtotime(date('Y-') . '04-01'));
        $abrDate = ["$year-04-01", $abrDay];

        $mayDay = date('Y-m-t', strtotime(date('Y-') . '05-01'));
        $mayDate = ["$year-05-01", $marDay];

        $julDay = date('Y-m-t', strtotime(date('Y-') . '06-01'));
        $julDate = ["$year-06-01", $julDay];

        $junDay = date('Y-m-t', strtotime(date('Y-') . '07-01'));
        $junDate = ["$year-07-01", $junDay];

        $augDay = date('Y-m-t', strtotime(date('Y-') . '08-01'));
        $augDate = ["$year-08-01", $augDay];

        $sepDay = date('Y-m-t', strtotime(date('Y-') . '09-01'));
        $sepDate = ["$year-09-01", $sepDay];

        $octDay = date('Y-m-t', strtotime(date('Y-') . '10-01'));
        $octDate = ["$year-10-01", $octDay];

        $novDay = date('Y-m-t', strtotime(date('Y-') . '11-01'));
        $novDate = ["$year-11-01", $novDay];

        $desDay = date('Y-m-t', strtotime(date('Y-') . '12-01'));
        $desDate = ["$year-12-01", $desDay];

        $filterYear=["$year-01-01",$desDay];
        $all_order_count=Order::whereBetween('created_at',$filterYear)->count();

        $admins = Admin::count();
        $biography = Biography::type("normal")->count();
        $biographySpecial = Biography::type("special")->count();
        $biographyFinished = Biography::type("normal")->status("finished")->count();
        $orders = Order::count();
        if($orders==0){
            $orders=1;
        }
        $finishedOrder=Order::where('status','finished')->count();
        $percentage=($finishedOrder/$orders??1)*100;
        $newOrder=Order::where('status','new')->count();
        $cancelOrder=Order::where('status','cancel')->count();
        $underWork=Order::Where('status','under_work')->count();


        $fromDate = date('Y-m',strtotime(' 0 month'.date('Y-m-d'))).'-1';
        $toDate = date('Y-m-t',strtotime(' 0 month'.date('Y-m-d')));
        $betweenMonth=[$fromDate,$toDate];
        $filterMonth=Order::whereBetween('created_at',$betweenMonth)->count();

        $users = User::count(); // User::where("type","normal_user")->count();
        $employer = User::where("type", "employer")->count();

//        if ($request->ajax()) {

            $newAdmins = Admin::whereHas("orders")->orderBy("id", "DESC")->get();
//            return DataTables::of($admins)
//                ->editColumn('image', function ($row) {
//                    return ' <img src="' . get_file($row->image) . '" class="rounded" style="height:60px;width:60px;"
//                             onclick="window.open(this.src)">';
//                })
//                ->editColumn('count', function ($row) {
//                    return count($row->orders);
//                })
//                ->editColumn('created_at', function ($row) {
//                    return date('Y/m/d', strtotime($row->created_at));
//                })
//
//
//               ->rawColumns([ 'image'])->make(true);
//        }

  $offices=RecruitmentOffice::with('cvs')->get();


        return view('admin.home.dashboard', [
            'admins' => $admins,
            'users' => $users,
            'biography' => $biography,
            'biographySpecial' => $biographySpecial,
            'biographyFinished' => $biographyFinished,
            'orders' => $orders,
            'employer' => $employer,
            'jan' => $janDate,
            'feb' => $febDate,
            'mar' => $marDate,
            'abr' => $abrDate,
            'may' => $mayDate,
            'jul' => $julDate,
            'jun' => $junDate,
            'aug' => $augDate,
            'sep' => $sepDate,
            'oct' => $octDate,
            'nov' => $novDate,
            'des' => $desDate,
            'percentage'    => $percentage,
            'newOrder'=>$newOrder,
            'cancelOrder'=>$cancelOrder,
            'finishedOrder'=>$finishedOrder,
            'filterMonth'  =>$filterMonth ,
            'underWork'   =>$underWork,
            'newAdmins'  =>$newAdmins,
            'offices'    =>$offices,
        ]);
    }//end fun


    public function calender(Request $request)
    {
        $arrResult =[];
        $orders = Order::get();
        //get count of orders by days
        foreach ($orders as $row) {
            $date = date('Y-m-d', strtotime($row->created_at));
            if (isset($arrResult[$date])) {
                $arrResult[$date]["counter"] += 1;
                $arrResult[$date]["id"][]  = $row->id;
            } else {
                $arrResult[$date]["counter"] = 1;
                $arrResult[$date]["id"][]  = $row->id;

            }
        }
      //  dd($arrResult);
        //make format of calender
        $Events = [];
        if (count($arrResult)>0) {
            $i = 0;
            foreach ($arrResult as $item => $value) {
                $title= $value['counter'];
                $Events[$i] = array(
                    'id' => $i,
                    'title' => $title,
                    'start' => $item,
                    'ids' => $value['id'],
                );
                $i++;
            }
        }
        //return to calender
        return $Events ;
    }//end fun


//    public function getCompaniesDetails(Request $request)
//    {
//        $ids = explode(',',$request->ids);
//        $companies = User::whereIn('id',$ids)->get();
//        return redirect()->route('companies.index')->with([
//            'ids'=>$ids
//        ]);
//    }//end fun


}//end
