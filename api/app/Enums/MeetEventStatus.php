<?php

namespace App\Enums;

enum MeetEventStatus: string
{
    case IN_PROGRESS = 'IN_PROGRESS';
    case COMPLETED = 'COMPLETED';
    case DELAYED = 'DELAYED';
    case CANCELED = 'CANCELED';
}
