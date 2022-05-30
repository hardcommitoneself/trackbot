<?php

namespace App\Support;

use JetBrains\PhpStorm\Pure;
use Str;

class SortableOption
{

    public readonly string $name;
    public readonly array $query;
    public readonly string $constant;

    #[Pure] public static function on(string $constant, $options = null): static
    {
        $instance = new static();
        $instance->constant = $constant;
        $instance->name = __('constants.sortOptions.' . Str::replace('.', '-', $instance->constant));
        switch ($constant) {
            case('athletes.name'):
                $instance->query = ['athletes.last_name', 'athletes.first_name'];
                break;
            default:
                $instance->query = [$instance->constant];
                break;
        }
        return $instance;
    }

    public function getRaw($direction = 'asc')
    {
        $ob = [];
        $direction = in_array($direction, ['asc', 'desc']) ? $direction : 'asc';

        foreach ($this->query as $queryPart) {
            $ob[] = $queryPart . ' ' . $direction;
        }

        return implode(', ', $ob);
    }

}
