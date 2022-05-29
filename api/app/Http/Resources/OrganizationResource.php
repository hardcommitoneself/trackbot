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
            'name'  => $this->name,
            'abbr'  => $this->abbr,
            'sport' => $this->sport,
        ];
    }

    protected function toLinks(Request $request): array
    {
        return [
            Link::self(route('organizations.show', $this->resource)),
            //'related' => 'https://example.com/related'
        ];
    }
}
