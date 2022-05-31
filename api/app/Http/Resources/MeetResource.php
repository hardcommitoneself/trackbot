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
            'director'               => fn() => optional($this->director,
                fn() => new UserResource($this->director)),
            'organization'           => fn() => new OrganizationResource($this->organization),
            'venue'                  => fn() => new VenueResource($this->venue),
            'athletes'               => fn() => AthleteResource::collection($this->athletes),
            'results'                => fn() => ResultResource::collection($this->results),
            'meetSessions'           => fn() => MeetSessionResource::collection($this->meetSessions),
            'meetDivisions'          => fn() => MeetDivisionResource::collection($this->meetDivisions),
            'events'                 => fn() => EventResource::collection($this->events),
            'meetEvents'             => fn() => MeetEventResource::collection($this->meetEvents),
            'meetEventEntries'       => fn() => MeetEventEntryResource::collection($this->meetEventEntries),
            'organizationsAttending' => fn() => OrganizationResource::collection($this->organizationsAttending),
        ];
    }

    protected function toMeta(Request $request): array
    {
        return [
            'timezone'                    => $this->timezone,
            'countAthletes'               => $this->athletes()->count(),
            'countMeetSessions'           => $this->meetSessions()->count(),
            'countMeetDivisions'          => $this->meetDivisions()->count(),
            'countEvents'                 => $this->events()->count(),
            'countMeetEvents'             => $this->meetEvents()->count(),
            'countMeetEventEntries'       => $this->meetEventEntries()->count(),
            'countOrganizationsAttending' => $this->organizationsAttending()->count(),
            'countResults'                => $this->results()->count(),
            'levels'                      => $this->levelValues(),
            'days'                        => $this->days(),
        ];
    }
}
