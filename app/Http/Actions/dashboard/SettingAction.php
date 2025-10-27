<?php

namespace App\Http\Actions\dashboard;


use App\Http\Actions\MainAction;
use App\Models\ingaz\Setting;
use Illuminate\Support\Facades\Storage;

class SettingAction extends MainAction
{
    public function __construct(Setting $model)
    {
        $this->model = $model;
        $this->fileFolder = "images/settings/";
    }

    public function getSetting() {
        $settings = $this->first();
        return $settings;

    }

    public function storeSetting($data,$request)
    {
        if ($request->hasFile('logo_header')) {
            $image = $data['logo_header'];
            $data['logo_header'] = uploadFile($image, $this->fileFolder,1);
        }
        if ($request->hasFile('about_image')) {
            $image = $data['about_image'];
            $data['about_image'] = uploadFile($image, $this->fileFolder,1);
        }
        if ($request->hasFile('logo_footer')) {
            $image = $data['logo_footer'];
            $data['logo_footer'] = uploadFile($image, $this->fileFolder,1);
        }
        if ($request->hasFile('favicon')) {
            $image = $data['favicon'];
            $data['favicon'] = uploadFile($image, $this->fileFolder,1);
        }
        return $this->store( $data);
    }

    public function updateSetting($id, $data)
    {
        if (isset($data['logo_header'])) {
            $obj = $this->find($id);
            deleteFile($obj->logo_header);
            $image = $data['logo_header'];
            $data['logo_header'] = uploadFile($image, $this->fileFolder,1);
        }
        if (isset($data['logo_footer'])) {
            $obj = $this->find($id);
            deleteFile($obj->logo_footer);
            $image = $data['logo_footer'];
            $data['logo_footer'] = uploadFile($image, $this->fileFolder,1);
        }
        if (isset($data['favicon'])) {
            $obj = $this->find($id);
            deleteFile($obj->favicon);
            $image = $data['favicon'];
            $data['favicon'] = uploadFile($image, $this->fileFolder,1);
        }
        if (isset($data['about_image'])) {
            $obj = $this->find($id);
            deleteFile($obj->about_image);
            $image = $data['about_image'];
            $data['about_image'] = uploadFile($image, $this->fileFolder,1);
        }
        //dd($data);
        $this->find($id)->update( $data);
    }

    public function deleteSetting($id)
    {
        $obj = $this->find($id);
        if ($obj->image != 'default.png') {
            Storage::delete('public/images/admins/settings/'.$obj->image);
        }
        $this->delete($id);
    }

}
