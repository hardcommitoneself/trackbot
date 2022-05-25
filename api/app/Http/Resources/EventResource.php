<?php

namespace App\Http\Resources;

use App\Models\Event;
use TiMacDonald\JsonApi\JsonApiResource;

class EventResource extends JsonApiResource
{

    public $collects = Event::class;

    public function toAttributes($request): array
    {
        return [
            'id'       => $this->id,
            'constant' => $this->constant,
            'sport'    => $this->sport->name,
        ];
    }
}
