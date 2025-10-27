<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class AppVisitResource extends JsonResource
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
			'android_count' => (string)$this->android_count,
			'ios_count' => (string)$this->ios_count,
			'web_count' => (string)$this->web_count,
			'date' => (string)$this->date,
			'created_at' => (string)$this->created_at,
			'updated_at' => (string)$this->updated_at,
		];
    }
}
