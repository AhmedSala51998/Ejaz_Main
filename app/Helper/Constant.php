<?php

namespace App\Helpers;

class Constant
{
    public static $compression = true;
    public static $quality_ratio = 90;
    public const globalArray = [
        "clint_types" => [
            '1' => [
                "ar" => "عميل",
                "en" => "en"
            ],
            '2' => [
                "ar" => "مسوق",
                "en" => "en"
            ],
            '3' => [
                "ar" => "عميل و مسوق ",
                "en" => "en"
            ],
        ],
        "bond_types" => [
            'sarf' => [
                "ar" => "سند صرف ",
                "en" => "en"
            ],
            'qabd' => [
                "ar" => "سند قبض ",
                "en" => "en"
            ],
        ],
        "bond_payment_type" => [
            '1' => [
                "ar" => "كاش - نقدى ",
                "en" => "en"
            ],
            '2' => [
                "ar" => "شيك",
                "en" => "en"
            ],
            '3' => [
                "ar" => "فيزا بنك  ",
                "en" => "en"
            ],
            '4' => [
                "ar" => "تحويل بنكى ",
                "en" => "en"
            ],
            '5' => [
                "ar" => "محفظة الكترونية",
                "en" => "en"
            ],
            '6' => [
                "ar" => "شبكة",
                "en" => "en"
            ],
        ],
        "note_types" => [
            '1' => [
                "ar" => "مشروع",
                "en" => "en"
            ],
            '2' => [
                "ar" => "مالية",
                "en" => "en"
            ],

        ],
        "constraint_types" => [
            '1' => ["ar" => "قيد يومى ", "en" => "DailyEntry"],
            '2' => ["ar" => "مبيعات", "en" => "Sales"],
            '3' => ["ar" => "مرتجع مبيعات", "en" => "SalesReturns"],
            '4' => ["ar" => "مشتريات", "en" => "Purchases"],
            '5' => ["ar" => "مردود مشتريات", "en" => "BackPurchases"],
            '6' => ["ar" => "سند صرف ", "en" => "SarfBond"],
            '7' => ["ar" => "سند قبض ", "en" => "QapdBond"],
            '8' => ["ar" => "تحصيل شيك ", "en" => "CheckCollection"],
            '9' => ["ar" => "صرف شيك ", "en" => "CheckSarf"],
            '10' => ["ar" => "رصيد اول ", "en" => "FirstBalance"],
            '11' => ["ar" => "تسجيل فرى لانس ", "en" => "FreelancerEntry"],
            '12' => ["ar" => "تسجيل عمولة ", "en" => "MarketerEntry"],
            '13' => ["ar" => "تحويل بين الخزن", "en" => "TransferEntry"],
        ],
        "project_language" => [
            'ar' => '( بالعربية)',
            'en' => '( بالإنجليزية )',
        ],
        "allowance_typeis" => [
            '1' => [
                "ar" => "يوم",
                "en" => "day"
            ],
            '2' => [
                "ar" => "قيمة",
                "en" => "VALUE"
            ],
            '3' => [
                "ar" => "نسبه %",
                "en" => "PERCENTAGE"
            ],
        ],
        "employee_vacation_status" => [
            '0' => [
                "ar" => "جديد",
                "en" => "new"
            ],
            '1' => [
                "ar" => "مقبول",
                "en" => "accepted"
            ],
            '2' => [
                "ar" => "مرفوض",
                "en" => "refused"
            ],
        ],
        "employee_attendances_type" => [
            '1' => [
                "ar" => "حضور و انصراف",
                "en" => "Attendance and departure"
            ],
            '2' => [
                "ar" => "حضور",
                "en" => "Attendance"
            ],
            '3' => [
                "ar" => "غياب",
                "en" => "absence"
            ],
            '4' => [
                "ar" => "عطلة نهاية الاسبوع",
                "en" => "Weekend"
            ],
            '5' => [
                "ar" => "متأخر",
                "en" => "Late"
            ],
            '6' => [
                "ar" => "أجازة",
                "en" => "Vacation"
            ],
            '7' => [
                "ar" => "الإجازة الرسمية",
                "en" => "Official Vacation"
            ],
        ],
        "admin_typeis" => [
//            'global_manager' => [
//                "ar" => " المدير العام",
//                "en" => "global manager"
//            ],
            'super_admin' => [
                "ar" => " المدير العام",
                "en" => "Super Admin"
            ],
            'call_center' => [
                "ar" => "خدمة عملاء",
                "en" => "call center"
            ],
            'customer_service' => [
                "ar" => "خدمة عملاء",
                "en" => "call center"
            ],

        ],
        "bonds" => [
            'expenses' => [
                "ar" => "مصروفات",
                "en" => "Expenses"
            ],
            'revenues' => [
                "ar" => "ارادات",
                "en" => "Revenues"
            ],

        ],
        "orders_statuses" => [
            'new' => [
                "ar" => "جديد",
                "en" => "new"
            ],
            'paid' => [
                "ar" => "مدفوع",
                "en" => "new"
            ],
            'completed' => [
                "ar" => "تم التعاقد",
                "en" => "completed"
            ],
            'started' => [
                'ar' => 'بدأت العمل',
                'en' => 'started',
            ],
            'done' => [
                'ar' => 'منتهي',
                'en' => 'done',
            ],
            'refused' => [
                'ar' => 'مرفوض',
                'en' => 'refused',
            ],
            'msaned' => [
                'ar' => 'تم الربط في مساند',
                'en' => 'To Msaned',
            ],
            'training' => [
                'ar' => 'تحت الاجراء والتدريب',
                'en' => 'Training',
            ],
            'arrived' => [
                'ar' => 'تم وصول العمالة',
                'en' => 'arrived',
            ],
            'escape' => [
                'ar' => 'هروب',
                'en' => 'Escape',
            ],
            'deportation' => [
                'ar' => 'تم الترحيل',
                'en' => 'Deportation',
            ],
        ],

        "contract_statuses" => [
            'new' => [
                "ar" => "بانتظار الاعتماد",
                "en" => "new"
            ],
            'msaned' => [
                "ar" => "عقود مساند",
                "en" => "msaned"
            ],
            'tafwed' => [
                "ar" => "تفويض",
                "en" => "tafwed"
            ],
            'taffez' => [
                "ar" => "تفييذ",
                "en" => "taffez"
            ],
            'tazker' => [
                "ar" => "تذكرة",
                "en" => "tazker"
            ],
            'back' => [
                "ar" => "مرتجع",
                "en" => "back"
            ],
            'arrival' => [
                "ar" => "مرحلة الوصول",
                "en" => "arrival"
            ],
            'sari' => [
                "ar" => "عقد ساري",
                "en" => "sari"
            ],
            'closed' => [
                "ar" => "عقد مغلق",
                "en" => "closed"
            ],
            'shelter' => [
                "ar" => "عقد إيواء",
                "en" => "shelter"
            ]
        ]
    ];

    public const filesPath = "/app/public/";
}
