<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use TiMacDonald\JsonApi\JsonApiResource;
use TiMacDonald\JsonApi\Link;

class MeetEventResource extends JsonApiResource
{
    public function toAttributes(Request $request): array
    {
        return [
        ];
    }

    protected function toLinks(Request $request): array
    {
        return [
            Link::self(route('meetEvents.show', $this->resource)),
        ];
    }

    public function toRelationships(Request $request): array
    {
        return [
            'event'        => fn() => new EventResource($this->event),
            'meetDivision' => fn() => new MeetDivisionResource($this->meetDivision),
        ];
    }
}
