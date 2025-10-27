<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
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
			'whatsapp' => (string)$this->whatsapp,
            'privacy' => html_entity_decode(strip_tags($this->privacy)),
            'terms_conditions' => html_entity_decode(strip_tags($this->terms_conditions)),
            'about_us_app' => html_entity_decode(strip_tags($this->about_us_app)),
            'title' => (string)$this->title,
            'footer_desc' => $this->footer_desc,
            'phone1' => $this->phone1,
            'phone2' => $this->phone2,
            'phone3' => $this->phone3,
            'phone4' => $this->phone4,
            'whatsappNumber' => $this->whatsappNumber,
            'callNumber' => $this->callNumber,
            'address1' => $this->address1,
            'address2' => $this->address2,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'email1' => $this->email1,
            'email2' => $this->email2,
            'our_service_desc' => $this->our_service_desc,
            'our_family_title1' => $this->our_family_title1,
            'our_family_desc1' => $this->our_family_desc1,
            'our_family_image1' => $this->our_family_image1,
            'our_family_title2' => $this->our_family_title2,
            'our_family_desc2' => $this->our_family_desc2,
            'our_family_image2' => $this->our_family_image2,
            'our_statistics_desc' => $this->our_statistics_desc,
            'recruitment_step_desc' => $this->recruitment_step_desc,
            'recruitment_step1_desc' => $this->recruitment_step1_desc,
            'recruitment_step2_desc' => $this->recruitment_step2_desc,
            'recruitment_step3_desc' => $this->recruitment_step3_desc,
            'recruitment_step4_desc' => $this->recruitment_step4_desc,
            'recruitment_step5_desc' => $this->recruitment_step5_desc,
            'application_for_the_recruitment' => $this->application_for_the_recruitment,
            'desc' => $this->desc,
            'terms_condition_link' => $this->terms_condition_link,
            'about_us_link' => $this->about_us_link,
            'privacy_policy_link' => $this->privacy_policy_link,
            'facebook' => $this->facebook,
            'twitter' => $this->twitter,
            'instagram' => $this->instagram,
            'linkedin' => $this->linkedin,
            'telegram' => $this->telegram,
            'youtube' => $this->youtube,
            'google_plus' => $this->google_plus,
            'snapchat_ghost' => $this->snapchat_ghost,
            'about_app' => $this->about_app,
            'terms_condition' => $this->terms_condition,
            'privacy_policy' => $this->privacy_policy,
            'login_banner' => $this->login_banner,
            'image_slider' => $this->image_slider,
            'company_profile_pdf' => $this->company_profile_pdf,
            'fax' => $this->fax,
            'android_app' => $this->android_app,
            'ios_app' => $this->ios_app,
            'link' => $this->link,
            'sms_user_name' => $this->sms_user_name,
            'sms_user_pass' => $this->sms_user_pass,
            'sms_sender' => $this->sms_sender,
            'publisher' => $this->publisher,
            'default_language' => $this->default_language,
            'default_theme' => $this->default_theme,
            'offer_muted' => $this->offer_muted,
            'offer_notification' => $this->offer_notification,
			// 'created_at' => (string)$this->created_at,
			// 'updated_at' => (string)$this->updated_at,
		];
    }
}
