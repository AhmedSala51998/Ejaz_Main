<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Http;

trait SendSMSTrait
{
    function sendSMS($phone, $msg)
    {
        if (substr($phone, 0, 2) == '05') {
            $phone = ltrim($phone, '0');
        } elseif (substr($phone, 0, 4) == '9660') {
            $phone = ltrim($phone, '9660');
        }
        $phone = '966' . $phone;
        // msegat
        // taqnyat
        //  ENV  MESSAGE_URL  MESSAGE_TOKEN  MESSAGE_SENDER
        try {
            // Code that may throw an exception
            $result = Http::get(env('MESSAGE_URL',"#"), [
                'body' => $msg,
                'recipients' => "$phone",
                'bearerTokens' => config('msegat.apiKey'),
                'sender' => env('MESSAGE_SENDER',"#"),
            ]);
            return $result->body();
        } catch (\Exception $e) {
            // Handle the exception here
            return $e->getMessage();
        }
    }
}
