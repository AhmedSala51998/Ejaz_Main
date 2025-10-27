<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class CookieResource extends JsonResource
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
			'value' => (string)$this->value,
			'visits_count' => (int)$this->visits_count,
			'created_at' => (string)$this->created_at,
			'updated_at' => (string)$this->updated_at,
		];
    }
}
