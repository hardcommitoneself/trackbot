<?php

namespace App\Models;

use App\Enums\Sport;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meet extends Model
{
    use HasFactory;
    use UUID;

    protected $casts = [
        'sport' => Sport::class,
        'is_sanctioned' => 'boolean'
    ];

    public function org()
    {
        return $this->belongsTo(Org::class);
    }
}
