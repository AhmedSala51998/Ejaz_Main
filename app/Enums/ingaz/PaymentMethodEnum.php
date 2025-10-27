<?php

namespace App\Enums\ingaz;

enum PaymentMethodEnum: string
{
    case Cash = "cash";
    case Online = "online";
    case ApplePay = "apple_pay";

}
