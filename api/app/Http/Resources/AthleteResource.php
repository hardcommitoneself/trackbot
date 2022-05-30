<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use TiMacDonald\JsonApi\JsonApiResource;
use TiMacDonald\JsonApi\Link;

class AthleteResource extends JsonApiResource
{
    public function toAttributes(Request $request): array
    {
        return [
            'first_name'         => $this->first_name,
            'last_name'          => $this->last_name,
            'gender'             => $this->gender,
            'hs_graduation_year' => $this->hs_graduation_year,
            'birthday'           => $this->birthday,
        ];
    }

    protected function toLinks(Request $request): array
    {
        return [
            Link::self(route('organizations.show', $this->resource)),
        ];
    }
}
