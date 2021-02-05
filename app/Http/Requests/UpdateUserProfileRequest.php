<?php

namespace App\Http\Requests;

use App\Models\Event;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateUserProfileRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('user_profile_update'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'avatar'       => ['required', 'mimes:jpeg,jpg,png,gif', 'max:10000'],
        ];
    }
}
