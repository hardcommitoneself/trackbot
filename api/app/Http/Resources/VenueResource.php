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
            'surface_material'    => $this->surface_material,
            'lanes'               => $this->lanes,
            'capacity'            => $this->capacity,
            'parking_information' => $this->parking_information,
        ];
    }
}
