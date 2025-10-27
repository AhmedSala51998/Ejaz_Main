<?php

namespace App\Http\Actions\auth;
use App\Http\Actions\MainAction;
use App\Models\auth\Admin;
use Illuminate\Support\Facades\Auth;

class ProfileAction extends MainAction
{
    public function __construct()
    {
        $this->model = new Admin();
        $this->fileFolder = "auth/profile/";
    }

    public function getAuthUser()
    {
        $user = Auth::guard('admin')->user();
        return $user;
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
