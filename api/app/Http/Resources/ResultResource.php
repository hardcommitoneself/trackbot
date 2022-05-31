<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use TiMacDonald\JsonApi\JsonApiResource;
use TiMacDonald\JsonApi\Link;

class ResultResource extends JsonApiResource
{
    public function toAttributes(Request $request): array
    {
        return [
            'static_athlete_first_name' => $this->static_athlete_first_name,
            'static_athlete_last_name'  => $this->static_athlete_last_name,
            'static_athlete_grade'      => $this->static_athlete_grade,
            'points'                    => $this->points,
            'is_official'               => $this->is_official,
            'is_dns'                    => $this->is_dns,
            'is_dq'                     => $this->is_dq,
            'dq_note'                   => $this->dq_note,
            'at'                        => $this->at,
        ];
    }

    protected function toLinks(Request $request): array
    {
        return [
            Link::self(route('results.show', $this->resource)),
        ];
    }

    public function toRelationships(Request $request): array
    {
        return [
            'athlete'        => fn() => new AthleteResource($this->athlete),
            'organization'   => fn() => new OrganizationResource($this->organization),
            'meet'           => fn() => new MeetResource($this->meet),
            'event'          => fn() => new EventResource($this->event),
            'meetEvent'      => fn() => new MeetEventResource($this->meetEvent),
            'meetEventEntry' => fn() => new MeetEventEntryResource($this->meetEventEntry),
        ];
    }
}
