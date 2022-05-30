<?php

namespace App\Models;

use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Athlete extends Model
{
    use HasFactory;
    use HasUuid;

    protected $casts = [
        'birthday'           => 'date',
        'hs_graduation_year' => 'integer',
    ];

    public function organizations()
    {
        return $this->belongsToMany(Organization::class)->withTimestamps();
    }

    public function meetEntries()
    {
        return $this->hasMany(MeetEntry::class);
    }
}
