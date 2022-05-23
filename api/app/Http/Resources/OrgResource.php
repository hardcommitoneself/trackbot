<?php

namespace App\Http\Resources;

use TiMacDonald\JsonApi\JsonApiResource;

class OrgResource extends JsonApiResource
{
    public function toAttributes($request) : array
    {
        return [
            'name' => $this->name,
        ];
    }
}
