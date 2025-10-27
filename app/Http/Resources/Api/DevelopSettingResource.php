<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class DevelopSettingResource extends JsonResource
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
			'copyrights' => (string)$this->copyrights,
			'name' => (string)$this->name,
			'portfolio_url' => (string)$this->portfolio_url,
			'licences_url' => (string)$this->licences_url,
			'support_url' => (string)$this->support_url,
			'faq_url' => (string)$this->faq_url,
			'home_url' => (string)$this->home_url,
			'about_url' => (string)$this->about_url,
			'translation_show' => (boolean)$this->translation_show,
			'login_text' => (string)$this->login_text,
			'created_at' => (string)$this->created_at,
			'updated_at' => (string)$this->updated_at,
		];
    }
}
