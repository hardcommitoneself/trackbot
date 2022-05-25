<?php

namespace App\Models\Concerns;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait HasConstant
{

    /**
     * Get the name from the constants translation file.
     * @return Attribute
     */
    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn() => __('constants.' . $this->getTable() . '.' . $this->constant),
        );
    }

    /**
     * Get the name from the constants translation file.
     * @return Attribute
     */
    protected function abbr(): Attribute
    {
        return Attribute::make(
            get: fn() => __('constants.' . $this->getTable() . '.abbr.' . $this->constant),
        );
    }

}
