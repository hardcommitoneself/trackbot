<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use TiMacDonald\JsonApi\JsonApiResource;

class VenueResource extends JsonApiResource
{

    public function toAttributes(Request $request): array
    {
        return [
            'name'                => $this->name,
            'description'         => $this->description,
            'surface'             => $this->surface,
            'lanes'               => $this->lanes,
            'capacity'            => $this->capacity,
            'parking_information' => $this->parking_information,
        ];
    }
}
