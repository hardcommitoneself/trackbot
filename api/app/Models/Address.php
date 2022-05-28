<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'line_1',
        'line_2',
        'city',
        'state_code',
        'country_code',
        'timezone',
        'zip',
        'latitude',
        'longitude',
        'altitude',
    ];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            if (empty($model->latitude) || empty($model->longitude) || $model->isDirty('city')) {
                if (config('googlemaps.key')) {
                    $model->setGeodata();
                    $model->setTimezone();
                    $model->setElevation();
                }
            }
        });
    }

    // this is *what* the address is owned by - org, venue, etc
    public function addressable()
    {
        return $this->morphTo();
    }

    protected function lineOne(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->line_1 . ($this->line_2 ? ' ' . $this->line_2 : ''),
        );
    }

    protected function lineTwo(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->city . ', ' . $this->state_code . ' ' . $this->zip,
        );
    }

    protected function asLine(): Attribute
    {
        return Attribute::make(
            get: fn(
            ) => $this->line_1 . ($this->line_2 ? ', ' . $this->line_2 : '') . ', ' . $this->city . ', ' . $this->state_code . ' ' . $this->zip,
        );
    }

    public function setGeodata()
    {
        $response = \GoogleMaps::load('geocoding')
            ->setParam(['address' => $this->asLine])
            ->setEndpoint('json')
            ->get('results.geometry.location');

        $location_data = ($response['results'][0]['geometry']['location']);
        $this->latitude = $location_data['lat'];
        $this->longitude = $location_data['lng'];
    }

    public function setTimezone()
    {
        $response = \GoogleMaps::load('timezone')
            ->setParam(['location' => $this->latitude . ',' . $this->longitude, 'timestamp' => now()->timestamp])
            ->setEndpoint('json')
            ->get('results');

        $timezone_data = ($response['timeZoneId']);
        $this->timezone = $timezone_data;
    }

    public function setElevation()
    {
        $response = \GoogleMaps::load('elevation')
            ->setParam(['locations' => $this->latitude . ',' . $this->longitude])
            ->setEndpoint('json')
            ->get('results');

        $elevation_data = ($response['results'][0]['elevation']);
        $this->elevation = $elevation_data;
    }

    public function getElevationInFeetAttribute()
    {
        return $this->elevation * 3.28084;
    }

    public function distanceTo(Address $address)
    {
        return (\DB::select(\DB::raw('
            select (ST_Distance_Sphere(
                point(:lonA, :latA),
                point(:lonB, :latB)
            ) * .000621371192) as distance
        '), [
            'lonA' => $this->longitude,
            'latA' => $this->latitude,
            'lonB' => $address->longitude,
            'latB' => $address->latitude,
        ]))[0]->distance;
    }

    // Scope by a range in MILES - Order by closest (.000621371192)
    // https://tighten.com/blog/a-mysql-distance-function-you-should-know-about/
    public function scopeDistanceWithin($query, $latitude, $longitude, $range = 50)
    {
        return $query->whereRaw("
       ST_Distance_Sphere(
            point(longitude, latitude),
            point(?, ?)
        ) * .000621371192 < $range
    ", [
            $longitude,
            $latitude,
        ])->orderByRaw(
            "ST_Distance_Sphere(
            point(longitude, latitude),
            point(?, ?)
        ) * .000621371192", [
                $longitude,
                $latitude,
            ]
        );
    }

}
