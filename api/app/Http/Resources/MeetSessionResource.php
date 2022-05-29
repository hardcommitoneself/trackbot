<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use TiMacDonald\JsonApi\JsonApiResource;

class MeetSessionResource extends JsonApiResource
{
    public function toAttributes(Request $request): array
    {
        return [
            'start_at' => $this->start_at,
            'end_at'   => $this->end_at,
        ];
    }
}
