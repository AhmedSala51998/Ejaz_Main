<?php

namespace App\Services\SMS;

use TaqnyatSms;

trait MesgatSMS
{

    function sendSMS($phone,$msg)
    {
        $bearer = '2a17275dc72bdb4bd16a93eaf6f6530e';
        $taqnyt = new TaqnyatSms($bearer);

        $body = 'message Content';
        $recipients = ['966********'];
        $sender = 'Ejazrec';
        $smsId = '25489';

        $phone= $phone;

        //$message =$taqnyt->sendMsg($msg, $phone, $sender, $smsId);

        $result = $taqnyt->sendMsg($msg, $phone, $sender, $smsId);

        return $result;

    }


}
