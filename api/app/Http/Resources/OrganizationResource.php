<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use TiMacDonald\JsonApi\JsonApiResource;

class OrganizationResource extends JsonApiResource
{

    public function toAttributes(Request $request): array
    {
        return [
            'name'  => $this->name,
            'abbr'  => $this->abbr,
            'sport' => $this->sport,
        ];
    }
}
