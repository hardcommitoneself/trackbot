<?php

namespace App\Models;

use App\Enums\Sport;
use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meet extends Model
{
    use HasFactory;
    use HasUuid;

    protected $casts = [
        'sport'         => Sport::class,
        'is_indoor'     => 'boolean',
        'is_sanctioned' => 'boolean',
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }

    public function director()
    {
        return $this->belongsTo(User::class, 'director_user_id');
    }

    public function sessions()
    {
        return $this->hasMany(MeetSession::class)->orderBy('start_at');
    }
}
