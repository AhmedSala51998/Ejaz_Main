<?php

namespace App\Http\Actions\ingaz;

use App\Enums\ingaz\NotificationActionEnum;
use App\Http\Actions\MainAction;
use App\Http\Traits\Firebase;
use App\Http\Traits\SendSMSTrait;
use App\Models\ingaz\Notification;
use App\Models\ingaz\User;

class NotificationAction extends MainAction
{
    use Firebase, SendSMSTrait;

    public function __construct(Notification $model)
    {
        $this->model = $model;
        $this->fileFolder = 'images/Notification/';
    }


    public function storeNotification($data, $request)
    {
        if ($request->type == 'sms') {
            if ($request->all_or_some == 'all') {
                $users = User::where('is_blocked', false)->get();
                foreach ($users as $user) {
                    $msg = $request->title['ar'] . "\n";
                    $msg .= $request->description['ar'];
                    $this->sendSMS($user->phone, $msg);
                }
            } elseif ($request->all_or_some == 'some') {
                $user = User::find($request->user_id);
                $msg = $request->title['ar'] . "\n";
                $msg .= $request->description['ar'];
                $this->sendSMS($user[0]->phone, $msg);
            }
        } else {
            $data['type'] = NotificationActionEnum::General->value;
            if ($request->all_or_some == 'all') {
                $data['user_id'] = null;
                $this->store($data);
                $data['user_id'] = User::where('is_blocked', false)->pluck('id')->ToArray();
            } elseif ($request->all_or_some == 'some') {
                $data['user_id'] = $request->user_id[0];
                $this->store($data);
            }
            foreach ($data['user_id'] as $to_user_id) {
                $data['user_id'] = $to_user_id;
                $this->sendFCMNotification($request->title, $request->description, $request->user_id, $data);
            }
        }
    }
}
