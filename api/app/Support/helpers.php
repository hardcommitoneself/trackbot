<?php

use App\Interfaces\Sorg;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

// ONLY USE THESE START
const DB_DATETIME_FORMAT = 'Y-m-d H:i:s';
const DATE_FORMAT_DMjS = 'D, M jS';             //  Thu, Jan 6th
const DATE_FORMAT_DMjSY = 'D, M jS, Y';        //  Thu, Jan 6th, 2022
const TIME_FORMAT_giAT = 'g:i A T';  //  7:34 AM MST
const TIME_FORMAT_giA = 'g:i A';  //  7:34 AM
const DATEPICKER_WITH_TIME_FORMAT = 'D, M jS, Y g:i A';                  //  Thu, Jan 6th, 2022 7:34 AM

// ONLY USE THESE END

// DATE & TIME
const DEFAULT_DATETIME_FORMAT = 'n/j/Y g:i:s A';                        //  1/6/2022 7:34:07 AM
const DEFAULT_DATETIME_FORMAT_WITH_TIMEZONE = 'n/j/Y g:i:s A T';        //  1/6/2022 7:34:07 AM MST
const SHORTENED_DATETIME_FORMAT = 'n/j/Y g:i A';                        //  1/6/2022 7:34 AM
const SHORTENED_DATETIME_FORMAT_WITH_TIMEZONE = 'n/j/Y g:i A T';        //  1/6/2022 7:34 AM MST
const EVENT_DATETIME_FORMAT = 'l, F jS Y g:i A';                        //  Thursday, January 6th 2022 7:34 AM
const EVENT_DATETIME_FORMAT_WITH_TIMEZONE = 'l, F jS Y g:i A T';        //  Thursday, January 6th 2022 7:34 AM MST
const SHORTER_EVENT_DATETIME_FORMAT = 'D, M jS g:i A';                  //  Thu, Jan 6th 7:34 AM
const SHORTER_EVENT_DATETIME_FORMAT_WITH_TIMEZONE = 'D, M jS g:i A T';  //  Thu, Jan 6th 7:34 AM MST
const FULL_EVENT_DATETIME_FORMAT_WITH_TIMEZONE = 'D, M jS, Y g:i A T';  //  Thu, Jan 6th, 2022 7:34 AM MST

// DATE ONLY
const DEFAULT_DATE_FORMAT = 'n/j/Y';                //  1/6/2022
const EXPANDED_DATE_FORMAT = 'M j, Y';              //  Jan 6, 2022
const SHORTER_EVENT_DATE_FORMAT = 'D, M jS';        //  Thu, Jan 6th
const PUBLISHED_DATE_FORMAT = 'D, M jS, Y';         //  Thu, Jan 6th, 2022

// TIME ONLY
const SHORTER_EVENT_TIME_FORMAT = 'g:i A';                  //  7:34 AM

if (!function_exists('noCents')) {
    /**
     * Return amount without cents.
     * @param  string  $amount
     * @return string
     */
    function noCents($amount)
    {
        return Str::before($amount, '.');
    }
}

if (!function_exists('noFormatNoCents')) {
    /**
     * Return amount without cents.
     * @param  string  $amount
     * @return string
     */
    function noFormatNoCents($string)
    {
        $nocents = noCents($string);

        return preg_replace('/[^0-9]/', '', $nocents);
    }
}

if (!function_exists('currentTrackYear')) {
    function currentTrackYear()
    {
        // once we hit 8/1 the currentTrackYear is next year
        return now()->month >= 8 ? now()->addYear()->year : now()->year;
    }
}

if (!function_exists('currentTrackYearAtDate')) {
    function currentTrackYearAtDate(Carbon $date)
    {
        // once we hit 8/1 the currentTrackYear is next year
        return $date->month >= 8 ? $date->addYear()->year : $date->year;
    }
}

if (!function_exists('sorg')) {
    function sorg()
    {
        if (app(Sorg::class)) {
            return app(Sorg::class);
        }
        return false;
    }
}

function hsGraduationYearForGrade(int $grade)
{
    return currentTrackYear() + (12 - $grade);
}

function gradeFromHsGraduationYear(int $year)
{
    $offset = currentTrackYear() - $year;
    return $offset + 12;
}

function sampleTime($length = 1, $min = 0, $max = 59)
{
    if ($length == 1) {
        return mt_rand($min, $max) . "." . mt_rand(10, 99);
    } elseif ($length == 2) {
        return mt_rand($min, $max) . ":" . str_pad(mt_rand(10, 59), 2, "0", STR_PAD_LEFT) . "." . mt_rand(10, 99);
    }
}

function sampleDistance($min = 1, $max = 99)
{
    return mt_rand($min, $max) . "." . str_pad(mt_rand(0, 99), 2, "0", STR_PAD_LEFT);
}

function sampleScore($min = 1000, $max = 9999)
{
    return mt_rand($min, $max);
}

function trimTime($time)
{
    $res = [];
    $e = explode(':', $time);
    $f = array_diff($e, ["00"]);
    foreach ($f as $g) {
        $res[] = ltrim($g, '0');
    }
    return implode(':', $res);
}

//function distancesIn()
//{
//    return session()->has('distances_in') ? session('distances_in') : 'english';
//}
//
//if (!function_exists('tzForUser')) {
//    function tzForUser()
//    {
//        return session()->has('tz') ? session('tz') : config('app.timezone');
//    }
//}
//
//if (!function_exists('dateForUser')) {
//    function dateForUser(\Carbon\Carbon $carbon)
//    {
//        $timezone = tzForUser() ?? config('app.timezone');
//        return Carbon::parse($carbon)->timezone($timezone);
//    }
//}
//
//if (!function_exists('dateFromUser')) {
//    function dateFromUser(\Carbon\Carbon $carbon)
//    {
//        return Carbon::parse($carbon)->timezone(config('app.timezone'));
//    }
//}
