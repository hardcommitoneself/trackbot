<?php

namespace App\Models;

use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Athlete extends Model
{
    use HasFactory;
    use HasUuid;

    protected $casts = [
        'birthday'           => 'date',
        'hs_graduation_year' => 'integer',
    ];

    public function organizations()
    {
        return $this->belongsToMany(Organization::class)->withTimestamps();
    }

    public function meetEventEntries()
    {
        return $this->hasMany(MeetEventEntry::class);
    }

    public function gradeFromHsGraduation($date = null)
    {
        if ($date instanceof Carbon) {
            $year = currentTrackYearAtDate($date);
        } else {
            $year = currentTrackYear();
        }
        $grade = '';

        if ($this->hs_graduation_year === $year) {
            $grade = 12;
        } elseif ($this->hs_graduation_year > $year) {
            $grade = 12 - ($this->hs_graduation_year - $year);
        } elseif ($this->hs_graduation_year < $year) {
            $grade = 'NA';
        }

        return $grade;
    }

    /**
     * Get the name from the constants translation file.
     * @return Attribute
     */
    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->last_name . ', ' . $this->first_name,
        );
    }

    /**
     * Get the name from the constants translation file.
     * @return Attribute
     */
    protected function firstLastName(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->first_name . ' ' . $this->last_name,
        );
    }

    protected function grade(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->gradeFromHsGraduation(),
        );
    }

    public function gradeAtDate(Carbon $date)
    {
        return $this->gradeFromHsGraduation($date);
    }

    protected function defaultProfilePhotoUrl()
    {
        $name = trim(collect(explode(' ', $this->firstLastName))->map(function ($segment) {
            return mb_substr($segment, 0, 1);
        })->join(' '));

        if ($this->gender->id === 1) {
            $bgColor = '3b82f6';
        }
        if ($this->gender->id === 2) {
            $bgColor = 'ec4899';
        }

        return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&color=FFFFFF&background=' . $bgColor;
    }
}
