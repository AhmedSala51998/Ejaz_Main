<?php

namespace App\Enums\ingaz;

enum ContractStatusEnum: string
{
    case New = 'new'; // بانتظار الاعتماد
    case Msaned = 'msaned'; // عقود مساند
    case Tafwed = 'tafwed'; // تفويض
    case Taffez = 'taffez'; // تفييذ
    case Tazker = 'tazker'; // تذكرة

    case Back = 'back'; // مرتجع
    case Arrival = 'arrival'; // مرحلة الوصول
    case Sari = 'sari'; // عقد ساري
    case Closed = 'closed'; // عقد مغلق

    case Shelter = 'shelter'; // عقد ايواء

}
