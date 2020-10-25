<?php

namespace App\Http\Requests\Frontend;

use App\Event;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreEventRequest extends FormRequest
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
            'start_time' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'after:now'
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
