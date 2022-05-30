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
    use \Staudenmeir\EloquentHasManyDeep\HasRelationships;

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

    public function meetSessions()
    {
        return $this->hasMany(MeetSession::class);
    }

    public function meetDivisions()
    {
        return $this->hasMany(MeetDivision::class);
    }

    public function organizationsAttending()
    {
        return $this->belongsToMany(Organization::class, 'meet_organization', 'meet_id')->withTimestamps();
    }

    public function meetEvents()
    {
        return $this->hasManyThrough(MeetEvent::class, MeetDivision::class);
    }

    public function events()
    {
        return $this->hasManyDeep(Event::class, [MeetDivision::class, MeetEvent::class],
            [
                'meet_id',
                'meet_division_id',
                'id',
            ],
        );
    }

    public function getAddressAttribute()
    {
        return $this->venue->address;
    }

    public function getTimezoneAttribute()
    {
        return $this->venue->address->timezone;
    }
}
