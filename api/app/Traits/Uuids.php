<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait Uuids
{
    /**
     * @return void
     */
    public function initializeUuids(): void
    {
        $this->setKeyType('string');
        $this->setIncrementing(false);
    }

    /**
     * @return void
     */
    public static function bootUuids(): void
    {
        static::creating(function (Model $model) {
            if (is_null($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Str::orderedUuid()->toString();
            }
        });
    }
}
