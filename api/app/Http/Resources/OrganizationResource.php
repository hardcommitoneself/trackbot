<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use TiMacDonald\JsonApi\JsonApiResource;
use TiMacDonald\JsonApi\Link;

class OrganizationResource extends JsonApiResource
{

    public function toAttributes(Request $request): array
    {
        return [
            'name'              => $this->name,
            'abbr'              => $this->abbr,
            'sport'             => $this->sport,
            'organization_type' => $this->organization_type,
        ];
    }

    protected function toLinks(Request $request): array
    {
        return [
            Link::self(route('organizations.show', $this->resource)),
        ];
    }

    public function toRelationships(Request $request): array
    {
        return [
            'athletes'    => fn() => AthleteResource::collection($this->athletes),
            'meets'       => fn() => MeetResource::collection($this->meets),
            'meetEntries' => fn() => MeetEntryResource::collection($this->meetEntries),
            'venues'      => fn() => VenueResource::collection($this->venues),
        ];
    }
}
