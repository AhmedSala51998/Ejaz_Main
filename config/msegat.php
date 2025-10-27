<?php

return [
    "msegat_url"=>env('MSEGAT_URL','https://www.msegat.com/gw/sendsms.php'),
    "userName"=>env('MSEGAT_USERNAME',''),
    "apiKey"=>env('MSEGAT_API_KEY',''),
    'userSender'=>env('MSEGAT_SENDER',''),
    'msgEncoding'=>env('MSEGAT_ENCODING')
];
