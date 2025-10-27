<?php

namespace App\Enums\ingaz;

enum OrderEnum: string
{
    case New = 'new'; // جديد
    case Paid = 'paid';  // مدفوع
    case Refused = 'refused'; // ملغي
    case Completed = 'completed'; // تم التعاقد
    case Done = 'done'; // تم الانتهاء
    case Msaned = 'msaned'; // تم الربط في مساند
    case Training = 'training'; // تحت الاجراء والتدريب
    case Arrived = 'arrived'; // تم وصول العمالة



    /// حالات الايجار
    case Started = 'started'; // بدء التعاقد
//    case Refused = 'refused'; // ملغي
    case Escape = 'escape'; // هروب
    case Deportation = 'deportation'; // تم الترحيل
}
