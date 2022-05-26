<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use TiMacDonald\JsonApi\JsonApiResource;

class EventResource extends JsonApiResource
{

    public function toId(Request $request): string
    {
        return $this->id;
    }

    public function toAttributes($request): array
    {
        return [
            'constant'    => $this->constant,
            'sport'       => $this->sport->name,
            'gender'      => $this->gender->name,
            'mark_type'   => $this->mark_type->name,
            'is_relay'    => $this->is_relay,
            'is_field'    => $this->is_field,
            'is_track'    => $this->is_track,
            'is_hurdles'  => $this->is_hurdles,
            'is_distance' => $this->is_distance,
            'is_sprint'   => $this->is_sprint,
            'is_jump'     => $this->is_jump,
            'is_jump'     => $this->is_jump,
            'is_throw'    => $this->is_throw,
            'is_multi'    => $this->is_multi,
            'has_wind'    => $this->has_wind,
            'has_wind'    => $this->has_wind,
            'has_wind'    => $this->has_wind,
            'sort'        => $this->sort,
        ];
    }
}
