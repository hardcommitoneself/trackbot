<?php

namespace App\Enums;

enum Round: string
{
    case FINALS = 'FINALS';
    case PRELIMS = 'PRELIMS';
    case SEMI_FINALS = 'SEMI_FINALS';
    case QUARTER_FINALS = 'QUARTER_FINALS';
}
