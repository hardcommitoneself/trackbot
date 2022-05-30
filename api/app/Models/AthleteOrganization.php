<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class AthleteOrganization extends Pivot
{
    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function athlete()
    {
        return $this->belongsTo(Athlete::class);
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}
