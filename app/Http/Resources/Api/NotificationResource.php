<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
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
			'title' => (string)$this->title,
			'description' => (string)$this->description,
			// 'type' => (string)$this->type,
			// 'order_id' => (int)$this->order_id,
            // 'order' => OrderResource::make($this->order),
			'user_id' => (int)$this->user_id,
            'user' => UserResource::make($this->user),
            'is_read' => (string)$this->is_read,
			'created_at' => (string)$this->created_at?->diffForHumans(),
			'updated_at' => (string)$this->updated_at?->diffForHumans(),
		];
    }
}
