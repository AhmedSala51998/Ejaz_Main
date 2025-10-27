<?php

namespace App\Http\Resources\Api;

use App\Models\Setting;
use Illuminate\Http\Resources\Json\JsonResource;

class MaidResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
        {
            $setting = Setting::first();
        return [
			'id' => (int)$this->id,
            'nationality_id' => (int)$this->nationalitie_id,
            'religion_id' => (int)$this->religion_id, 
            'job_id' => (int)$this->job_id,
            "type" => (string)$this->type,
            'nationality' => NationalityResource::make($this->nationalitie),
			'passport_num' => (string)$this->passport_num,
            'religion' => $this->religion->title,
			'social_type' => $this->social_type->title,
			'age' => (int)$this->age,
			'experience_years' => (string)$this->experience_years,
			'cv_file' =>(string)  get_file($this->cv_file),
			'image' => (string) get_file($this->images->first()),
			'available' => (boolean)$this->available,
			'customer_service_whatsapp' => (string)@$setting->whatsapp,
			'available_at' => (string)$this->available_at,
			'is_show' => (boolean)$this->is_show,
			// 'jobTypes' => MaidJobResource::collection($this->job_types),
			// 'jobTitles' => MaidJobTitleResource::make($this->job_titles->first()),
            'cv_file' => get_file($this->cv_file),
            'images' => $this->images->map(function ($image) {
				return [
					'image' => get_file($image->image)
                ];
            }),
            'job_title' =>  $this->job->title,
            'salary' => $this->salary,
            'cv_name' => $this->cv_name,
            'passport_number' => $this->passport_number,
			'high_degree' =>$this->high_degree ??'',
            'type_of_experience' => $this->type_of_experience =='with_experience'?__('frontend.with_experience') : __('frontend.new'),
			'nationalitie_price' => $this->nationalitie->price,// تكلفه الاستقدام
            'reasonService' => $this->reasonService,
            'periodService' => $this->periodService,
			'nationalitie_service_price' => $this->nationalitie->price_service,// سعر نقل الخدمات
			// 'created_at' => (string)$this->created_at,
			// 'updated_at' => (string)$this->updated_at,
		];
    }
}
