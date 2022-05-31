<?php

namespace App\Models;

use App\Enums\Gender;
use App\Enums\MarkType;
use App\Enums\Sport;
use App\Models\Concerns\HasConstant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    use HasConstant;

    protected $guarded = ['created_at', 'updated_at'];

    protected $casts = [
        'sport'       => Sport::class,
        'gender'      => Gender::class,
        'mark_type'   => MarkType::class,
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

    public function getRouteKeyName()
    {
        return 'constant';
    }

    public function sample()
    {
        if ($this->sport->value === 'TRACK') {
            if ($this->is_sprint) {
                return sampleTime(1, 9, 59);
            }
            if ($this->is_distance) {
                return sampleTime(2, 1, 20);
            }
            if ($this->is_field) {
                return sampleDistance();
            }
            if ($this->is_multi) {
                return sampleScore();
            }
        }
    }
}
