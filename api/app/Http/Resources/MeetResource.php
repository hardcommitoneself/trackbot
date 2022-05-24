<?php

namespace App\Http\Resources;

use TiMacDonald\JsonApi\JsonApiResource;
use TiMacDonald\JsonApi\Link;

// https://github.com/timacdonald/json-api

class MeetResource extends JsonApiResource
{
    public function toAttributes($request): array
    {
        return [
            'name'          => $this->name,
            'sport'         => $this->sport->name,
            'information'   => $this->information,
            'is_indoor'     => $this->is_indoor,
            'is_sanctioned' => $this->is_sanctioned,
        ];
    }

    protected function toLinks($request): array
    {
        return [
            Link::self(route('meets.show', $this->resource)),
            //'related' => 'https://example.com/related'
        ];
    }

    public function toRelationships($request): array
    {
        return [
            'organization' => fn() => new OrgResource($this->organization),
        ];
    }
}
