<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $guarded = ['created_at', 'updated_at'];

    protected $casts = [
        'is_relay'    => 'boolean',
        'is_field'    => 'boolean',
        'is_track'    => 'boolean',
        'is_hurdles'  => 'boolean',
        'is_distance' => 'boolean',
        'is_sprint'   => 'boolean',
        'is_jump'     => 'boolean',
        'is_throw'    => 'boolean',
        'has_wind'    => 'boolean',
        'is_multi'    => 'boolean',
    ];
}
