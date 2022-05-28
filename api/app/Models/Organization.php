<?php

namespace App\Models;

use App\Enums\OrganizationType;
use App\Enums\Sport;
use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;
    use HasUuid;

    protected $guarded = [];

    protected $casts = [
        'sport'             => Sport::class,
        'organization_type' => OrganizationType::class,
    ];

    public function meets()
    {
        return $this->hasMany(Meet::class);
    }

    public function venues()
    {
        return $this->hasMany(Venue::class);
    }

}
