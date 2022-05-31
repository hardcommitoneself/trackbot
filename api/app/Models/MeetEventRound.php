<?php

namespace App\Models;

use App\Enums\Round;
use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetEventRound extends Model
{
    use HasFactory;
    use HasUuid;

    protected $casts = [
        'round'      => Round::class,
        'start_time' => 'datetime',
    ];

    public function meetEvent()
    {
        return $this->belongsTo(MeetEvent::class);
    }

    public function meetSession()
    {
        return $this->belongsTo(MeetSession::class);
    }
}
