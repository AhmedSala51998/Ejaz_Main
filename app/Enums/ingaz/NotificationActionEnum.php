<?php

namespace App\Enums\ingaz;

enum NotificationActionEnum: string
{
    case NewOrder = "new_order";
    case OrderStatus = "order_status";
    case General = "general";
    case Saved = "saved";
}
