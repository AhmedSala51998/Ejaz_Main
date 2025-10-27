<?php

namespace App\Http\Traits;

use App\Models\ingaz\UserFirebaseToken;
use Illuminate\Support\Facades\Http;

trait Firebase
{
    public function sendFCMNotification($title, $message, $id,$data = [])
    {
        $serverKey = 'AAAAS3wslyE:APA91bECJfsgdTKrh7AeXc_LL9IYe9SGKwwgjtco5GXuzybA_CuIGCdxIOtuOs8P5ty5CPzgKmio3rY1qOUlk6qM5lsKSrSCO5uo7xyhjLhlWwOYhmHjOVErwLcBCLI3aj0j3myVf0lh';
        $url = 'https://fcm.googleapis.com/fcm/send';
        $recipientTokens = $this->getRecipientTokens($id);
        // dd($recipientTokens);
        $data = [
            'notification' => [
                'title' => $title,
                'body' => $message,
            ],
            'registration_ids' => $recipientTokens,
            'data' => $data,
        ];
        // dd($data);

        $headers = [
            'Authorization' => 'key=' . $serverKey,
            'Content-Type' => 'application/json',
        ];

        $response = Http::withHeaders($headers)
            ->post($url, $data);
        // dd($response);
        return $response->body();
    }

    public function getRecipientTokens($userId)
    {
        return UserFirebaseToken::where('user_id', $userId)->pluck('phone_token')->toArray();
    }

}
