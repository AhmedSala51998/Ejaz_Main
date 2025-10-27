<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderDetailResource extends JsonResource
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
			'order_id' => (int)$this->order_id,
			'admin_id' => (int)$this->admin_id,
            'customer' => CustomerResource::make($this->admin),
			'package_id' => (int)$this->package_id,
            'package' => PackageResource::make($this->package),
			'address_id' => (int)$this->address_id,
            'address' => UserAddressResource::make($this->address),
			// 'created_at' => (string)$this->created_at,
			// 'updated_at' => (string)$this->updated_at,
		];
    }
}
