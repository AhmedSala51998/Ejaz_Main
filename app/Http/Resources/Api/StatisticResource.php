<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class StatisticResource extends JsonResource
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
			'image' => (string)$this->image,
			'counter_num' => (string)$this->counter_num,
			'counter_unit' => (string)$this->counter_unit,
			'created_at' => (string)$this->created_at,
			'updated_at' => (string)$this->updated_at,
		];
    }
}
