<?php

namespace App\Enums;

enum RegisterFromType: string
{
    case Android = "android";
    case Ios = "ios";
    case Web = "web";
}
