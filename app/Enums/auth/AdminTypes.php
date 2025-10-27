<?php

namespace App\Enums\auth;

enum AdminTypes: string
{
    case GlobalManger = "super_admin";
    case CustomerService = "customer_service";
}
