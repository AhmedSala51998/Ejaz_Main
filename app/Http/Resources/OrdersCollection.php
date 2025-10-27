<?php

namespace App\Http\Resources;

use App\Models\Notes;
use App\Models\ReservationStatus;
use Illuminate\Http\Resources\Json\ResourceCollection;

class OrdersCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => $this->collection->transform(function($data) {

                if ($data->status == "canceled"){
                 $status= __('frontend.orderCanceled');
                 $status_1="محذوف";
                }
                elseif ($data->status == "under_work"){
                    $status='تم حجز السيرة الذاتيه ';
                      $status_1="حجز السيرة الذاتية";
                }
                elseif ($data->status == "tfeez")
                {
                 $status= 'اصبح التعاقد الخاص بكم  فى مرحلة التفييز بنجاح ';
                   $status_1="التفييز";
                }
                elseif ($data->status == "musaned"){
                                $status= 'تم ربط العقد الخاص بكم في مساند بنجاح  ';
                                  $status_1="مساند";

                }

                elseif ($data->status == "traning"){
                $status='اصبح التعاقد الخاص بكم فى مرحلة الاجراءات بنجاح ';
                  $status_1="مرحلة الاجراءات";
}
                elseif ($data->status == "contract"){
               $status= ' تم قبول التعاقد الخاص بكم ';
                 $status_1="التعاقد";
}
                elseif($data->status == "finished"){
               $status= __('frontend.orderDone');
                 $status_1="تم تسليم العاملة";
                }


                return [
                    'id' => $data->id,
                    'images' =>get_file($data->biography->cv_file),
                     'status'=>$status,
                     "stage"=>$status_1,
                     "passport"=>$data->biography->passport_number,
                    'nationality'=>$data->biography->nationalitie?$data->biography->nationalitie->title:"",
                    'occupation'=>$data->biography->job?$data->biography->job->title:"",
                    'arrived_at'=>(isset($data->arrived_at))? ((isset($data->arrived_at)) ?date('d-m-Y h:i a', strtotime($data->arrived_at)):"غير محدد"):"غير محدد",
                   'adminstaff' =>$data->admin->name,
                    'adminstaff_user' =>!empty($data->Adminstaff)?$data->Adminstaff:"",
                    'admin_whats_link'=>'https://api.whatsapp.com/send?phone='.$data->admin->whats_up_number ,
                    'phone'=>$data->admin->phone,
                    'notes'=>Notes::where('order_id', $data->id)->latest()->first()->note,


                ];
            })
        ];
    }

    public function with($request)
    {
        return [
            'success' => true,
            'status' => 200
        ];
    }
}
