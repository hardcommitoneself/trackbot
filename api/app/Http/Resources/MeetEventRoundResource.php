<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use TiMacDonald\JsonApi\JsonApiResource;
use TiMacDonald\JsonApi\Link;

class MeetEventRoundResource extends JsonApiResource
{
    public function toAttributes(Request $request): array
    {
        return [
            'start_at' => $this->start_at,
            'sort'     => $this->sort,
            'round'    => $this->round,
            'status'   => $this->status,
        ];
    }

    protected function toLinks(Request $request): array
    {
        return [
            Link::self(route('meetEventRounds.show', $this->resource)),
        ];
    }

    public function toRelationships(Request $request): array
    {
        return [
            'meetEvent'   => fn() => new MeetEventResource($this->meetEvent),
            'meetSession' => fn() => new MeetSessionResource($this->meetSession),
        ];
    }
}
