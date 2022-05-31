<?php

namespace App\Models;

use App\Enums\Gender;
use App\Enums\Sport;
use App\Enums\TimingType;
use App\Models\Concerns\HasMark;
use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory, HasUuid, HasMark;

    protected $casts = [
        'sport'       => Sport::class,
        'gender'      => Gender::class,
        'timing_type' => TimingType::class,
        'is_official' => 'boolean',
        'is_dns'      => 'boolean',
        'is_dq'       => 'boolean',
        'at'          => 'date',
    ];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->static_athlete_first_name = $model->athlete->first_name;
            $model->static_athlete_last_name = $model->athlete->last_name;
            $model->static_athlete_grade = $model->at ? $model->athlete->gradeAtDate($model->at) : null;
        });
    }

    public function athlete()
    {
        return $this->belongsTo(Athlete::class);
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function meet()
    {
        return $this->belongsTo(Meet::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function meetEvent()
    {
        return $this->belongsTo(MeetEvent::class);
    }

    public function scheduledEvent()
    {
        return $this->belongsTo(ScheduledEvent::class);
    }

    public function meetEventEntry()
    {
        return $this->belongsTo(MeetEventEntry::class);
    }

}
