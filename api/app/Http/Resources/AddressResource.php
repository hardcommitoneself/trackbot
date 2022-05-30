<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use TiMacDonald\JsonApi\JsonApiResource;
use TiMacDonald\JsonApi\Link;

class AddressResource extends JsonApiResource
{
    public function toAttributes(Request $request): array
    {
        return [
            'line_1'       => $this->line_1,
            'line_2'       => $this->line_2,
            'city'         => $this->city,
            'state_code'   => $this->state_code,
            'zip'          => $this->zip,
            'country_code' => $this->country_code,
        ];
    }

    protected function toLinks(Request $request): array
    {
        return [
            Link::self(route('address.show', $this->resource)),
            'related' => route(Str::lower(Str::plural(class_basename($this->addressable))) . '.show',
                $this->addressable),
        ];
    }

    protected function toMeta(Request $request): array
    {
        return [
            'elevation' => $this->elevation,
            'timezone'  => $this->timezone,
            'latitude'  => $this->latitude,
            'longitude' => $this->longitude,
        ];
    }
}
