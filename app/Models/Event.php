<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;

    public $table = 'events';

    protected $casts = [
        'attendees_ids' => 'array'
    ]; 

    protected $dates = [
        'end_time',
        'start_time',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const RECURRENCE_RADIO = [
        'none'    => 'None',
        'daily'   => 'Daily',
        'weekly'  => 'Weekly',
        'monthly' => 'Monthly',
    ];

    const CATEGORIES = [
        'lectures'    => 'Lectures',
        'sports'   => 'Sports',
        'charities'  => 'Charities',
        'fairs' => 'Fairs',
        'festivals' => 'Festivals',
        'cultures' => 'Cultures',
    ];

    protected $fillable = [
        'name',
        'start_time',
        'end_time',
        'event_id',
        'category',
        'attendees_ids',
        'moderator_id',
        'points',
        'location',
        'desc',
        'max_no_attendees',
        'status',
        'recurrence',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function events()
    {
        return $this->hasMany(Event::class, 'event_id', 'id');
    }

    public function getStartTimeAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setStartTimeAttribute($value)
    {
        $this->attributes['start_time'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getEndTimeAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setEndTimeAttribute($value)
    {
        $this->attributes['end_time'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    public function saveQuietly()
    {
        return static::withoutEvents(function () {
            return $this->save();
        });
    }
}
