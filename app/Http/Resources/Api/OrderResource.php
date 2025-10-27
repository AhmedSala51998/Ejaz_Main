<?php

namespace App\Http\Resources\Api;

use App\Models\Notes;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
	 */
	public function toArray($request)
	{
		$status = null;
		$status_1 = null;
		if ($this->status == "canceled") {
			$status = __('frontend.orderCanceled');
			$status_1 = "محذوف";
		} elseif ($this->status == "under_work") {
			$status = 'تم حجز السيرة الذاتيه ';
			$status_1 = "حجز السيرة الذاتية";
		} elseif ($this->status == "tfeez") {
			$status = 'اصبح التعاقد الخاص بكم  فى مرحلة التفييز بنجاح ';
			$status_1 = "التفييز";
		} elseif ($this->status == "musaned") {
			$status = 'تم ربط العقد الخاص بكم في مساند بنجاح  ';
			$status_1 = "مساند";
		} elseif ($this->status == "traning") {
			$status = 'اصبح التعاقد الخاص بكم فى مرحلة الاجراءات بنجاح ';
			$status_1 = "مرحلة الاجراءات";
		} elseif ($this->status == "contract") {
			$status = ' تم قبول التعاقد الخاص بكم ';
			$status_1 = "التعاقد";
		} elseif ($this->status == "finished") {
			$status = __('frontend.orderDone');
			$status_1 = "تم تسليم العاملة";
		}

		return [
			'id' => $this->id,
			'images' => get_file($this->biography?->cv_file),
			'status' => $status,
			"stage" => $status_1,
			'maid_id' => (int)$this->biography_id,
			'maid' => MaidResource::make($this->biography),
			"passport" => $this->biography?->passport_number,
			'nationality' => $this->biography?->nationalitie ? $this->biography?->nationalitie?->title : "",
			'occupation' => $this->biography?->job ? $this->biography?->job?->title : "",
			'arrived_at' => (isset($this->arrived_at)) ? ((isset($this->arrived_at)) ? date('d-m-Y h:i a', strtotime($this->arrived_at)) : "غير محدد") : "غير محدد",
			'adminstaff' => $this->admin?->name,
			'adminstaff_user' => !empty($this->Adminstaff) ? $this->Adminstaff : "",
			'admin_whats_link' => 'https://api.whatsapp.com/send?phone=' . $this->admin?->whats_up_number,
			'phone' => $this->admin?->phone,
			'notes' => Notes::where('order_id', $this->id)->latest()->first()?->note,
			'user_id' => (int)$this->user_id,
			'user' => UserResource::make($this->user),
			// return [
			// 	'id' => (int)$this->id,
			// 	'payment_method' => (string)$this->payment_method,
			// 	'maid_id' => (int)$this->biography_id,
			// 	'maid' => MaidResource::make($this->biography),

			// 	'order_code' => (string)$this->order_code,
			// 	'job_type_id' => (int)$this->job_type_id,
			// 	'job_type' => JobTypeResource::make($this->jobType),
			// 	'status' => (string)$this->status,
			//     'order_details ' => OrderDetailResource::make($this->details),
			'created_at' => (string)$this->created_at,
			// 'updated_at' => (string)$this->updated_at,
		];
	}
}
