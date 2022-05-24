<?php

namespace App\Enums;

enum Classification: string
{
    case PROFESSIONAL = "PROFESSIONAL";
    case COLLEGIATE = "COLLEGIATE";
    case HIGH_SCHOOL = "HIGH_SCHOOL";
    case MIDDLE_SCHOOL = "MIDDLE_SCHOOL";
    case ELEMENTARY = "ELEMENTARY";
    case CLUB = "CLUB";
}
