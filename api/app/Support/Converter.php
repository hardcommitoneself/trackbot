<?php

namespace App\Support;

use Exception;

class Converter
{
    function toImperial($value, $cmValue = null)
    {
        $cmVal = is_null($cmValue) ? 0 : $cmValue;

        $length = 100 * $value / 2.54 + $cmVal / 2.54;

        $feet = floor($length / 12);

        $inch = $length - 12 * $feet;
        $inchFractions = (round(($inch * 4))) / 4;

        $result = $feet . '-' . $inchFractions;

        return $result;
    }

    function toMetric($value)
    {
        if (is_null($value)) {
            return '0';
        }

        if (!str_contains($value, '-')) {
            throw new Exception('Invalid format.');
        }

        $splitVal = explode('-', $value);
        $feet = $splitVal[0];
        $inches = $splitVal[1];

        return round($feet * 0.3048 + floatval($inches) * 0.0254, 2);
    }
}
