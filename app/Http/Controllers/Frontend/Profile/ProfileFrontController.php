<?php

namespace App\Http\Controllers\Frontend\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\Auth\RegisterRequest;
use App\Http\Traits\Upload_Files;
use App\Models\City;
use App\Models\Notification;
use App\Models\Order;
use App\Models\User;
use App\Models\UserNotification;
use App\Services\SMS\MesgatSMS;
use Illuminate\Http\Request;

class ProfileFrontController extends Controller
{

    use Upload_Files;
    use MesgatSMS;

    public function profile_view()
    {
        if (!auth()->check()) {
            toastr()->error(__('frontend.errorMessageAuth'),__('frontend.errorTitleAuth'));
            return redirect()->back();
        }
        $user = auth()->user();
        return view('frontend.pages.profile.profile',compact('user'));
    }//end fun



    public function get_profile_current_orders(Request $request)
    {
        $user = auth()->user();
        $currentOrders = Order::where([
            'user_id'=>$user->id,
            'status'=>'under_work',
        ])->whereHas('admin', function ($q) {
            $q->where('id','!=',null);
        })
            ->whereHas('biography', function ($q) {
                $q->where('id','!=',null);
            })
            ->with('admin','biography','biography.recruitment_office','biography.nationalitie',
                'biography.language_title',
                'biography.religion','biography.job',
                'biography.social_type','biography.images','biography.skills')
            ->latest()
            ->paginate(2);
        $html = view("frontend.pages.profile.parts.currentOrders",[
            'currentOrders'=>$currentOrders,
            'last_page'=>$currentOrders->lastPage() ,
            'current_page'=>$currentOrders->currentPage() ,
        ])->render();
        return response()->json(['html' => $html,'user'=>$user]);
    }//end fun
    //

    public function loadMoreCurrentOrders(Request $request)
    {
        $user = auth()->user();
        $page = $request->page;
        $currentOrders = Order::where([
            'user_id'=>$user->id,
            'status'=>'under_work',
        ])->whereHas('admin', function ($q) {
            $q->where('id','!=',null);
        })
            ->whereHas('biography', function ($q) {
                $q->where('id','!=',null);
            })->with('admin','biography','biography.recruitment_office','biography.nationalitie',
                'biography.language_title',
                'biography.religion','biography.job',
                'biography.social_type','biography.images','biography.skills')
            ->latest()
            ->paginate(2);
        $html = view("frontend.pages.profile.parts.current_order_component",[
            'currentOrders'=>$currentOrders,
            'last_page'=>$currentOrders->lastPage() ,
            'current_page'=>$currentOrders->currentPage() ,
        ])->render();
        return response()->json([
            'success' => true,
            'html' => $html,
            'current_page' => $page,
            'last_page' => $currentOrders->lastPage(),
        ]);
    }//end fun

    public function get_profile_orders_history(Request $request)
    {
        $user = auth()->user();
        $ordersHistory = Order::where(['user_id'=>$user->id])
            ->whereIn('status',['tfeez','traning','musaned','contract','finished','canceled'])
            ->whereHas('admin', function ($q) {
                $q->where('id','!=',null);
            })
            ->whereHas('biography', function ($q) {
                $q->where('id','!=',null);
            })->with('admin','biography','biography.recruitment_office','biography.nationalitie',
                'biography.language_title',
                'biography.religion','biography.job',
                'biography.social_type','biography.images','biography.skills')
            ->latest()
            ->paginate(2);
        $html = view("frontend.pages.profile.parts.ordersHistory",[
            'ordersHistory'=>$ordersHistory,
            'last_page'=>$ordersHistory->lastPage() ,
            'current_page'=>$ordersHistory->currentPage() ,
        ])->render();
        return response()->json(['html' => $html,'user'=>$user]);
    }//end fun


    public function loadMoreOrdersHistory(Request $request)
    {
        $user = auth()->user();
        $page = $request->page;
        $ordersHistory = Order::where(['user_id'=>$user->id])
            ->whereIn('status',['finished','canceled'])
            ->whereHas('admin', function ($q) {
                $q->where('id','!=',null);
            })
            ->whereHas('biography', function ($q) {
                $q->where('id','!=',null);
            })->with('admin','biography','biography.recruitment_office','biography.nationalitie',
                'biography.language_title',
                'biography.religion','biography.job',
                'biography.social_type','biography.images','biography.skills')
            ->latest()
            ->paginate(2);

        $html = view("frontend.pages.profile.parts.history_order_component",[
            'ordersHistory'=>$ordersHistory,
            'last_page'=>$ordersHistory->lastPage() ,
            'current_page'=>$ordersHistory->currentPage() ,
        ])->render();
        return response()->json([
            'success' => true,
            'html' => $html,
            'current_page' => $page,
            'last_page' => $ordersHistory->lastPage(),
        ]);
    }//end fun

    public function get_profile_Notifications(Request $request)
    {
        $user = auth()->user();
        $notifications = UserNotification::where('user_id',$user->id)->latest()->paginate(4);
        $html =  view("frontend.pages.profile.parts.notifications",[
            'notifications'=>$notifications,
            'last_page'=>$notifications->lastPage() ,
            'current_page'=>$notifications->currentPage() ,
        ])->render();
        return response()->json(['html' => $html,'user'=>$user]);
    }//end fun


    public function loadMoreNotifications(Request $request)
    {
        $page = $request->page;
        $notifications = UserNotification::where('user_id',auth()->user()->id)->latest()->paginate(4);
        $returnHTML = view('frontend.pages.profile.parts.notifications-component')
            ->with(['notifications' => $notifications])->render();
        return response()->json([
            'success' => true,
            'html' => $returnHTML,
            'current_page' => $page,
            'last_page' => $notifications->lastPage(),
        ]);
    }//end fun



    public function get_edit_Profile_form(Request $request)
    {
        $user = auth()->user();
        $html =  view("frontend.pages.profile.parts.EditProfile")
            ->with(['user'=>auth()->user(),'cities'=>City::get()])->render();
        return response()->json(['html' => $html,'user'=>$user]);
    }//end fun

    public function get_order_details($order_id)
    {
        $user = auth()->user();
       $order= Order::where([
           'user_id'=>$user->id,
       ])->whereHas('admin', function ($q) {
           $q->where('id','!=',null);
       })
           ->whereHas('biography', function ($q) {
               $q->where('id','!=',null);
           })
           ->with('admin','biography','biography.recruitment_office','biography.nationalitie',
               'biography.language_title',
               'biography.religion','biography.job',
               'biography.social_type','biography.images','biography.skills')
           ->find($order_id);
       return view('frontend.pages.profile.parts.details_order',compact('order','user'));
    }//end fun
    public function changeBasicDataOFProfile(Request $request)
    {
        $user = auth()->user();
        $data = [
            'city_id'=>$request->city_id,
            'name'=>$request->name,
        ];
        if ($request->hasFile('logo')) {
            $data['logo'] = $this->upload_image_or_make_new_image($request->logo , substr($request->name, 0, 1).substr($request->name, 0, 1) );
        }else{
            $data['logo'] = auth()->user()->logo;
        }

        User::where("id",$user->id)->update($data );
        $user = User::findOrFail($user->id);
        $user->logo_link = get_file($user->logo);
        return response()->json(["user"=>$user],200);
    }//end fun


    public function changePasswordOFProfile(Request $request)
    {
        $user = auth()->user();
        User::where("id",$user->id)->update( [
            'password'=>bcrypt($request->password)
        ]);
        return response()->json([],200);
    }



    public function check_phone_to_send_otp(Request $request)
    {
        if ($this->check_if_phone_exist_or_not() == "phone_exists") {
            return response()->json([],403);
        }

        $code = $this->sendOTP($request->phone);
        return response()->json($code,200);
    }//end fun



    public function save_new_phone(Request $request)
    {
        if ($this->check_if_phone_exist_or_not() == "phone_exists") {
            return response()->json([],403);
        }
        $data = [
            'phone'=>$request->phone
        ];
        $data['phone_activation_code'] = $request->code;
        $data['activated_at'] = now();
        $user = User::where('id',auth()->user()->id)->update($data);
        return response()->json(["user"=>$user],200);
    }//end fun



    /**
     * @return string
     *
     * check if phone not exists
     */
    private function check_if_phone_exist_or_not()
    {
        $user = User::where([
            'phone'=>request()->phone,
            'type'=>'normal_user',
        ])->first();
        if ($user) {
            return "phone_exists";
        }
        return "phone_not_exists";
    }//end fun

    private function upload_image_or_make_new_image($image , $name)
    {
        if ($image) {
            return $this->uploadFiles('users',$image,'');
        }
        return $this->createImageFromTextManual('users' , $name ,256 , '#000', '#fff');
    }


    public function sendOTP($phone)
    {
        if (env('SMS_Work')== 'work') {
            $code = rand(1111,9999);
            $this->sendSMS($phone,"كود التحقق هو $code");
            return $code;
        }
        return 1234;
    }//end fun


}//end class
