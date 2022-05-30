<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use TiMacDonald\JsonApi\JsonApiResource;
use TiMacDonald\JsonApi\Link;

// https://github.com/timacdonald/json-api

class MeetResource extends JsonApiResource
{
    public function toAttributes(Request $request): array
    {
        return [
            'name'          => $this->name,
            'sport'         => $this->sport->name,
            'information'   => $this->information,
            'is_indoor'     => $this->is_indoor,
            'is_sanctioned' => $this->is_sanctioned,
        ];
    }

    protected function toLinks(Request $request): array
    {
        return [
            Link::self(route('meets.show', $this->resource)),
            //'related' => 'https://example.com/related'
        ];
    }

    public function toRelationships(Request $request): array
    {
        return [
            'user__director'           => fn() => optional($this->user__director,
                fn() => new UserResource($this->user__director)),
            'organization'             => fn() => new OrganizationResource($this->organization),
            'venue'                    => fn() => new VenueResource($this->venue),
            'meetSessions'             => fn() => MeetSessionResource::collection($this->meetSessions),
            'meetDivisions'            => fn() => MeetDivisionResource::collection($this->meetDivisions),
            '__events'                 => fn() => EventResource::collection($this->__events),
            '__meetEvents'             => fn() => MeetEventResource::collection($this->__meetEvents),
            'organizations__attending' => fn() => OrganizationResource::collection($this->organizations__attending),
        ];
    }

    protected function toMeta(Request $request): array
    {
        return [
            'timezone' => $this->timezone,
        ];
    }
}
