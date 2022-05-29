<?php

namespace App\Models;

use App\Enums\Round;
use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetEvent extends Model
{
    use HasFactory;
    use HasUuid;

    protected $casts = [
        'round' => Round::class,
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function meetDivision()
    {
        return $this->belongsTo(MeetDivision::class);
    }
}
