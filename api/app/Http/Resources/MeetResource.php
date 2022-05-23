<?php

namespace App\Http\Resources;

use TiMacDonald\JsonApi\JsonApiResource;

class MeetResource extends JsonApiResource
{
    public function toAttributes($request): array
    {
        return [
          'name' => $this->name
        ];
    }


    public function toRelationships($request): array {
        return [
            'org' => fn () => new OrgResource($this->org),
        ];
    }
}
