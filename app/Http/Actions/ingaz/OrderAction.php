<?php

namespace App\Http\Actions\ingaz;

use App\Enums\ingaz\NotificationActionEnum;
use App\Enums\ingaz\OrderEnum;
use App\Http\Actions\MainAction;
use App\Http\Traits\Firebase;
use App\Models\ingaz\Maid;
use App\Models\ingaz\Notification;
use App\Models\Order;
use App\Models\ingaz\OrderDetail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class OrderAction extends MainAction
{
    use Firebase;
    public function __construct(Order $model)
    {
        $this->model = $model;
        $this->fileFolder = 'images/Order/';
    }

    public function getIndex($status)
    {
        $acceptedStatuses = [];
        if ($status == 'current') {
            $acceptedStatuses = ["under_work",'tfeez','traning','musaned','contract'];
        } elseif ($status == 'previous') {
            $acceptedStatuses = ['finished','canceled'];
        }
        $data = $this->model->where('user_id', getGuardedUser()->id)
            ->whereIn('status', $acceptedStatuses)
            ->with(
                'admin',
                'biography',
                'biography.recruitment_office',
                'biography.nationalitie',
                'biography.language_title',
                'biography.religion',
                'biography.job',
                'biography.social_type',
                'biography.images',
                'biography.skills'
            );
            return $data;
    }

    public function storeOrder($data,$request)
    {
        $data['user_id'] = Auth::user()->id;
        $data['order_code'] = $this->model::generateUniqueCode();
        $order = $this->store($data);
        if ($request->details_list) {
            $this->StoreOrderDetails($request,$order);
        }
        $this->StoreNotification($order);
        $order = $this->model->find($order->id);
        return $order;
    }

    public function StoreOrderDetails($request,$order) {
//        foreach ($request->details_list as $key => $details_list) {
            $dataProduct = [
                'admin_id' => $request->details_list['admin_id'] ?? null,
                'package_id' => $request->details_list['package_id'] ?? null,
                'address_id' => $request->details_list['address_id'] ?? null,
                'order_id' => $order->id,
            ];
            $results = OrderDetail::create($dataProduct);
//        }
    }

    public function StoreNotification($order,$type = null) {
        $notification = Notification::create([
            'user_id' => $order->user_id,
            'order_id' => $order->id,
            "type" => ($type != null ) ? $type : NotificationActionEnum::NewOrder->value,
            'title' => [
                'en' => __('notifications.Asus Al Injaz',[],'en'),
                'ar' => __('notifications.Asus Al Injaz',[],'ar'),
            ],
            'description' => [
                'en' => __('notifications.There is a new order',[],'en') . $order->id,
                'ar' => __('notifications.There is a new order',[],'ar') . $order->id,
            ],
        ]);
        $data = [
            "type" => $notification->type,
            "order_id" => $notification->order_id,
        ];
        $fire = $this->sendFCMNotification($notification->title,$notification->description, $notification->user_id,$data);
    }

    public function updateOrderStatus($id,$data){
        $order = $this->find($id);
        $maid = Maid::find($order->maid_id);
        if ($data['status'] == 'completed' || $data['status'] == 'started') {
            $maid->available = 0;
        }

        if ($data['status'] == 'started' && $order->package) {
//            if(now() < $maid->available_at){
//                return jsonValid('','asd',422);
//            }
            $maid->available = 0;
            $maid->available_at = Carbon::now()->addDays($order->package->days_count);
        }
        if ($data['status'] == 'done') {
            $maid->available = 1;
            $maid->available_at = Carbon::now();
        }
        $notification = Notification::create([
            'user_id' => $order->user_id,
            'order_id' => $order->id,
            "type" => NotificationActionEnum::OrderStatus->value,
            'title' => [
                'en' => __('notifications.Asus Al Injaz',[],'en'),
                'ar' => __('notifications.Asus Al Injaz',[],'ar'),
            ],
            'description' => [
                'en' => __('notifications.update_order_status',[],'en') . $order->id,
                'ar' => __('notifications.update_order_status',[],'ar') . $order->id,
            ],
        ]);
        $send = [
            "type" => $notification->type,
            "order_id" => $notification->order_id,
        ];
        $this->sendFCMNotification($notification->title,$notification->description, $notification->user_id,$send);
        $maid->save();

        return $this->find($id)->update(['status' => $data['status']]);
    }

}
