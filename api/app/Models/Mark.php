<?php

namespace App\Models;

use App\Enums\MarkType;
use App\Models\Concerns\HasUuid;
use App\Support\Converter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory, HasUuid;

    protected $casts = [
        'mark_type' => MarkType::class,
    ];

    // this is *what* the address is owned by - org, venue, etc
    public function markable()
    {
        return $this->morphTo();
    }

    public function getColumnAttribute()
    {
        return strtolower($this->mark_type->value);
    }

    public function getValueAttribute()
    {
        $column = $this->column;
        return $this->$column;
    }

    public function toMetric()
    {
        return $this->value;
    }

    public function toEnglish()
    {
        if ($this->mark_type->value === 'DISTANCE') {
            return (new Converter())->toEnglish($this->value);
        }

        return $this->value;
    }

}
