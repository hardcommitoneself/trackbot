<?php

namespace App\Enums;

enum RoundType: string
{
    case FINAL = 'FINAL';
    case HEATS = 'HEATS';
    case TIMED_FINAL = 'TIMED_FINAL';
}
