<?php

namespace App\Support;

use App\Models\MarkType;

class Mark
{

    protected $markType;
    protected $mark;

    public function __construct(MarkType $markType, $mark)
    {
        $this->markType = $markType;
        $this->mark = $mark;
    }

    public function raw()
    {
        return $this->mark;
    }

    public function markType()
    {
        return $this->markType;
    }

    public function display()
    {
        $column = $this->markType->column();
        if ($column == 'time') {
            return trimTime($this->mark);
        }
        if ($column == 'distance') {
            $distancesIn = distancesIn() ? distancesIn() : 'imperical';

            if ($distancesIn == 'metric') {
                return $this->mark;
            }

            return (new Converter())->toImperial($this->mark);
        }
        return $this->mark;
    }

}
