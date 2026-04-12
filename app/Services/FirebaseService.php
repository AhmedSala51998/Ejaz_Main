<?php

namespace App\Services;

use Google\Client;

class FirebaseService
{
    protected $projectId = "ejaz-9780d";

    public function getAccessToken()
    {
        $client = new Client();
        $client->setAuthConfig(storage_path('app/firebase/firebase-key.json'));
        $client->addScope('https://www.googleapis.com/auth/firebase.messaging');

        $token = $client->fetchAccessTokenWithAssertion();

        return $token['access_token'];
    }

    public function send($tokens, $title, $body, $image = null)
    {
        $accessToken = $this->getAccessToken();

        foreach ($tokens as $token) {

            if(!$token) continue;

            $data = [
                "message" => [
                    "token" => $token,

                    "notification" => [
                        "title" => $title,
                        "body" => $body,
                        "image" => $image,
                    ],

                    "android" => [
                        "notification" => [
                            "icon" => "ic_notification",
                            "color" => "#D89835",
                        ]
                    ]
                ]
            ];

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, "https://fcm.googleapis.com/v1/projects/{$this->projectId}/messages:send");
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                "Authorization: Bearer $accessToken",
                "Content-Type: application/json"
            ]);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

            curl_exec($ch);
            curl_close($ch);
        }
    }
}
