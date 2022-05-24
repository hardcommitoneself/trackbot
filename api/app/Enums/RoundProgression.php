<?php

namespace App\Enums;

enum RoundProgression: string
{
    case FINALS = 'FINALS';
    case HEATS_FINAL = 'HEATS_FINAL';
    case HEATS_SEMIS_FINAL = 'HEATS_SEMIS_FINAL';
    case OPEN = 'OPEN';
}
