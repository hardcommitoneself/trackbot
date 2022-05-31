<?php

namespace App\Models;

use App\Enums\Round;
use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduledEvent extends Model
{
    use HasFactory, HasUuid;

    protected $casts = [
        'round'      => Round::class,
        'start_time' => 'datetime',
    ];
}
