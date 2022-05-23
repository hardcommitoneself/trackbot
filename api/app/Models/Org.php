<?php

namespace App\Models;

use App\Enums\OrgType;
use App\Enums\Sport;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Org extends Model
{
    use HasFactory;
    use UUID;

    protected $guarded = [];

    protected $casts = [
        'sport' => Sport::class,
        'org_type' => OrgType::class,
    ];

    public function meets() {
        return $this->hasMany(Meet::class);
    }

}
