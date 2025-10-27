<?php

namespace App\Http\Actions\ingaz;

use App\Http\Actions\MainAction;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAction extends MainAction
{
    public function __construct(User $model)
    {
        $this->model = $model;
        $this->fileFolder = 'images/User/';
    }

    public function storeUser($data)
    {
        $data['password'] = $data['password'] ;
        return $this->store($data);
    }

    public function updateUser($id, $data)
    {
        $obj = $this->find($id);
        if (isset($data['password'])) {
            $data['password'] = $data['password'];
        }
        if (isset($requset->new_password)) {
            if (Hash::check($requset->old_password, $obj->password)) {
                $obj->update([
                    'password' => $requset->new_password
                ]);
            } else {
                return false;
            }
        }
       return $this->find($id)->update( $data);
    }

    public function updatePassword($request) {
        $user = $this->find(auth('api')->user()->id);
        if(Hash::check($request->old_password,$user->password)) {
            $user->update([
                'password' => $request->new_password
            ]);
            return true;
        } else {
            return false;
        }
    }

    public function getCounts(){
        $allCount = $this->model->count();
        $thisMonthCount = $this->model
            ->whereYear('created_at', now()->year)
            ->whereMonth('created_at', now()->month)
            ->count();
        return [
            'allCount' => $allCount,
            'thisMonthCount' => $thisMonthCount,
        ];
    }
}
