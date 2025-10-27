<?php

namespace App\Http\Actions\ingaz;
use App\Http\Actions\MainAction;
use App\Models\FirebaseToken;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserFirebaseTokenAction extends MainAction
{
    public function __construct(FirebaseToken $model)
    {
        $this->model = $model;
    }

    public function storeUserFirebaseToken($data, $request)
    {
        $data['user_id'] = Auth::user()->id;

        $attributes = [
            'phone_token' => $data['phone_token'],
            'software_type' => $data['software_type']
        ];

        $exist = $this->model->where('user_id', Auth::user()->id)
            ->where('software_type', $request->software_types)
            ->first();

        if (isset($exist)) {
            $exist->update($attributes);
        } else {
            $attributes['user_id'] = Auth::user()->id;
            $this->model->create($attributes);
        }

        return $data;
    }

    public function updateUserFirebaseToken($id, $data)
    {
        return $this->update($id,$data);
    }


}


