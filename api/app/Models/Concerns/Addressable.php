<?php

namespace App\Models\Concerns;

use App\Models\Address;

trait Addressable
{
    // polymorphic
    public function address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }
}
