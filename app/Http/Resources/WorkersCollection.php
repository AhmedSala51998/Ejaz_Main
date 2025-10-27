<?php

namespace App\Http\Resources;

use App\Models\ReservationStatus;
use Illuminate\Http\Resources\Json\ResourceCollection;

class WorkersCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'list' => $this->collection->transform(function($data) {



                return [
                    'id' => $data->id,
                    'images' =>get_file($data->cv_file),
                    'nationality'=>($data->nationalitie !=null)?$data->nationalitie->title:"--",
                    'occupation'=>$data->job?$data->job->title:"",
                    'religion'=>(isset($data->arrived_at))? ((isset($data->arrived_at)) ?date('d-m-Y h:i a', strtotime($data->arrived_at)):"غير محدد"):"غير محدد",
                   'social_type' =>$data->social_type->title??'',
                    'passport_number'=>$data->passport_number??'',
                    'nationalitie_price'=>$data->nationalitie->price??'',
                    'high_degree' =>$data->high_degree ??'',
                    'age'=>$data->age??'',
                    'salary'=>$data->salary??'',


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
