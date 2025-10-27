<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
			'phone_code' => (string)$this->phone_code,
			'phone' => (string)$this->phone,
			'is_blocked' => (string)$this->is_blocked,
            'token' => isset($this->token) ? $this->token : '',
			// 'remember_token' => (string)$this->remember_token,
			// 'created_at' => (string)$this->created_at,
			// 'updated_at' => (string)$this->updated_at,
		];
    }
}
