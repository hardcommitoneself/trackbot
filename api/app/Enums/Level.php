<?php

namespace App\Enums;

enum Level: string
{
    case PROFESSIONAL = "PROFESSIONAL";
    case COLLEGE = "COLLEGE";
    case HIGH_SCHOOL = "HIGH_SCHOOL";
    case MIDDLE_SCHOOL = "MIDDLE_SCHOOL";
    case ELEMENTARY = "ELEMENTARY";
    case UNATTACHED = "UNATTACHED";
    case CLUB = "CLUB";
}
