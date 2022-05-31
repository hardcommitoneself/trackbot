<?php

namespace App\Models\Concerns;

use App\Models\Mark;

trait HasMark
{
    // polymorphic
    public function mark()
    {
        return $this->morphOne(Mark::class, 'markable');
    }
}
