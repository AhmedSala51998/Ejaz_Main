<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
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
			'name' => (string)$this->name,
			'email' => (string)$this->email,
			'phone' => (string)$this->phone,
			'whatsapp' => (string)$this->whats_up_number,
			'image' => (string)get_file($this->image),
			// 'sex_type' => (boolean)$this->sex_type,
			// 'remember_token' => (string)$this->remember_token,
			// 'created_at' => (string)$this->created_at,
			// 'updated_at' => (string)$this->updated_at,
		];
    }
}
