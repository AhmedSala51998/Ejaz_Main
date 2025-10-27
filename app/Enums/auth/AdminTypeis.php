<?php

namespace App\Enums\auth;

enum AdminTypeis: string
{
    case GlobalManger = "super_admin";
    case CallCenter = "call_center";
    case CustomerService = "customer_service";
}
