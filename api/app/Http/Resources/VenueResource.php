<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use TiMacDonald\JsonApi\JsonApiResource;
use TiMacDonald\JsonApi\Link;

class VenueResource extends JsonApiResource
{

    public function toAttributes(Request $request): array
    {
        return [
            'name'                => $this->name,
            'description'         => $this->description,
            'surface_material'    => $this->surface_material,
            'lanes'               => $this->lanes,
            'capacity'            => $this->capacity,
            'parking_information' => $this->parking_information,
        ];
    }

    protected function toLinks(Request $request): array
    {
        return [
            Link::self(route('venues.show', $this->resource)),
        ];
    }

    public function toRelationships(Request $request): array
    {
        return [
            'address' => fn() => new AddressResource($this->address),
        ];
    }
}
