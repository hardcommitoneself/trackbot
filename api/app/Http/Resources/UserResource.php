<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use TiMacDonald\JsonApi\JsonApiResource;

class UserResource extends JsonApiResource
{
    protected function toAttributes(Request $request): array
    {
        return [
            'first_name' => $this->first_name,
            'last_name'  => $this->last_name,
            'email'      => $this->email,
            'timezone'   => $this->timezone,
        ];
    }

    protected function toMeta(Request $request): array
    {
        return [
            'profile_photo_url' => $this->profile_photo_url,
        ];
    }
}
