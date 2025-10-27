<?php

namespace App\Enums\ingaz;

enum NotificationsTypeEnum: string
{
    case General = 'general';
    case Order = 'order';
    case NewOrder = "new_order";
    case OrderStatus = "order_status";
    case Saved = "saved";
}
