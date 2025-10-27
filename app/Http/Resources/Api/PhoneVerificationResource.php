<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class PhoneVerificationResource extends JsonResource
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
			'phone_code' => (string)$this->phone_code,
			'phone' => (string)$this->phone,
			'code' => (string)$this->code,
			'created_at' => (string)$this->created_at,
			'updated_at' => (string)$this->updated_at,
		];
    }
}
