<?php

namespace App\Models;

use App\Enums\Level;
use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetDivision extends Model
{
    use HasFactory;
    use HasUuid;

    protected $casts = [
        'level' => Level::class,
    ];

    public function meet()
    {
        return $this->belongsTo(Meet::class);
    }

    public function meetEvents()
    {
        return $this->hasMany(MeetEvent::class);
    }
}
