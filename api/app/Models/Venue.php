<?php

namespace App\Models;

use App\Models\Concerns\Addressable;
use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    use HasFactory;
    use Addressable;
    use HasUuid;

    protected $fillable = [
        'organization_id',
        'name',
        'description',
        'surface_material',
        'capacity',
        'parking_information',
        'profile_photo_path',
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
    
}
