<?php

namespace App\Http\Actions\ingaz;

use App\Http\Actions\MainAction;
use App\Models\ingaz\UserAddress;
use Illuminate\Support\Facades\Auth;

class UserAddressAction extends MainAction
{
    public function __construct(UserAddress $model)
    {
        $this->model = $model;
        $this->fileFolder = 'images/UserAddress/';
    }

    public function storeUserAddress($data)
    {
        $data['user_id'] = getGuardedUser()->id;
        return $this->store($data);
    }
    public function updateUserAddress($id, $data)
    {
        $obj = $this->find($id);
        if (isset($obj)) {
            return $obj->update($data);
        } else {
            return false;
        }
    }

    public function deleteUserAddress($id)
    {
        $obj = $this->find($id);
        if (isset($obj)) {
            $this->delete($id);
            return true;
        } else {
            return false;
        }
    }
}
