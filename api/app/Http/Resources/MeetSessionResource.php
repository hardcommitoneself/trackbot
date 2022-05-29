<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use TiMacDonald\JsonApi\JsonApiResource;
use TiMacDonald\JsonApi\Link;

class MeetSessionResource extends JsonApiResource
{
    public function toAttributes(Request $request): array
    {
        return [
            'starting_at' => $this->starting_at,
            'ending_at'   => $this->ending_at,
        ];
    }

    protected function toLinks(Request $request): array
    {
        return [
            Link::self(route('meetSessions.show', $this->resource)),
        ];
    }

    public function toRelationships(Request $request): array
    {
        return [
            'meet' => fn() => new MeetResource($this->meet),
        ];
    }

    protected function toMeta(Request $request): array
    {
        return [
            'timezone' => $this->meet->timezone,
        ];
    }
}
