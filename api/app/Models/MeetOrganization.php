<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class MeetOrganization extends Pivot
{
    public function meet()
    {
        return $this->belongsTo(Meet::class);
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}
