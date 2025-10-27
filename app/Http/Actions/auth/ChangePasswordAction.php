<?php

namespace App\Http\Actions\auth;
use App\Http\Actions\MainAction;
use App\Models\auth\Admin;
use Illuminate\Support\Facades\Auth;

class ChangePasswordAction extends MainAction
{
    public function __construct()
    {
        $this->model = new Admin();
        $this->fileFolder = "auth/profile/";
    }

    public function updateProfile($id, $data)
    {
        if (isset($data['image'])) {
            $obj = $this->find($id);
            deleteFile($obj->image);
            $image = $data['image'];
            $data['image'] = uploadFile($image, $this->fileFolder);
        }
        $this->update($id, $data);
    }
}
