<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use TiMacDonald\JsonApi\JsonApiResource;
use TiMacDonald\JsonApi\Link;

class MarkResource extends JsonApiResource
{
    public function toAttributes(Request $request): array
    {
        return [
            'mark_type' => $this->mark_type->value,
            'english'   => $this->toEnglish(),
            'metric'    => $this->toMetric(),
        ];
    }

    protected function toLinks(Request $request): array
    {
        return [
            Link::self(route('marks.show', $this->resource)),
            'related' => route(Str::lower(Str::plural(class_basename($this->markable))) . '.show',
                $this->markable),
        ];
    }
}
