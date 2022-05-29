<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use TiMacDonald\JsonApi\JsonApiResource;
use TiMacDonald\JsonApi\Link;

class MeetDivisionResource extends JsonApiResource
{
    public function toAttributes(Request $request): array
    {
        return [
            'name'       => $this->name,
            'abbr'       => $this->abbr,
            'level'      => $this->level,
            'identifier' => $this->identifier,
        ];
    }

    protected function toLinks(Request $request): array
    {
        return [
            Link::self(route('meetDivisions.show', $this->resource)),
        ];
    }

    public function toRelationships(Request $request): array
    {
        return [
            'meet' => fn() => new MeetResource($this->meet),
        ];
    }

}
