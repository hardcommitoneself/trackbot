<?php

namespace App\Models;

use App\Enums\Sport;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meet extends Model
{
    use HasFactory;
    use Uuids;

    protected $casts = [
        'sport'         => Sport::class,
        'is_indoor'     => 'boolean',
        'is_sanctioned' => 'boolean',
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}
