<?php

namespace App\Models;

use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetEvent extends Model
{
    use HasFactory;
    use HasUuid;

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function meetEventEntries()
    {
        return $this->hasMany(MeetEventEntry::class);
    }

    public function meetDivision()
    {
        return $this->belongsTo(MeetDivision::class);
    }

    public function meetEventRounds()
    {
        return $this->hasMany(MeetEventRound::class);
    }
}
