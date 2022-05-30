<?php

namespace App\Models;

use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetEntry extends Model
{
    use HasFactory;
    use HasUuid;
    use \Znck\Eloquent\Traits\BelongsToThrough;

    public function meet()
    {
        return $this->belongsTo(Meet::class);
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function athlete()
    {
        return $this->belongsTo(Athlete::class);
    }

    public function meetEvent()
    {
        return $this->belongsTo(MeetEvent::class);
    }

    public function event()
    {
        return $this->belongsToThrough(Event::class, MeetEvent::class);
    }

}
