<?php

namespace App\Http\Requests\Frontend;

use App\Event;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateEventRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name'       => [
                'required',
            ],
            'location'       => [
                'required',
            ],
            'points'       => [
                'required',
                'integer',
                'max:10',
                'min: 1'
            ],
            'max_no_attendees'       => [
                'required',
                'integer',
                'min:5'
            ],
            'start_time' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'end_time'   => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'after:start_time'
            ],
            'recurrence' => [
                'required',
            ],
        ];
    }
}
