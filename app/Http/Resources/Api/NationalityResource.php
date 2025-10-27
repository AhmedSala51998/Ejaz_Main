<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class NationalityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
        {
        return [
			'id' => (int)$this->id,
            'logo' => (string)get_file($this->image),
            'country' => (string)$this->title,
            'desc' => (string)$this->desc,
            'price' => (double)$this->price,
            'price_service' => (double)$this->price_service,


            // 'country_name' => (string)$this->country_name,
			// 'nationality' => (string)$this->sub_title,
			// 'phone_code' => (string)$this->phone_code,
			// 'created_at' => (string)$this->created_at,
			// 'updated_at' => (string)$this->updated_at,
		];
    }
}
