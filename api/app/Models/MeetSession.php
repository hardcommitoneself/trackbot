<?php

namespace App\Models;

use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetSession extends Model
{
    use HasFactory;
    use HasUuid;

    protected $casts = [
        'starting_at' => 'datetime',
        'ending_at'   => 'datetime',
    ];

    public function meet()
    {
        return $this->belongsTo(Meet::class);
    }
}
