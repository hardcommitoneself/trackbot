<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Org extends Model
{
    use HasFactory;
    use UUID;

    protected $guarded = ['created_at', 'updated_at', 'id', 'uuid'];

}
