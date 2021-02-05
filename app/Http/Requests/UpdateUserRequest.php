<?php

namespace App\Http\Requests;

use App\Models\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'     => ['required'],
            'email'   => [
                'required',
                'unique:users,email,' . request()->route('user')->id,
            ],
            'phone'     => ['nullable', 'regex:/^([0-9\s\-\+\(\)]*)$/','min:10'],
            'dob', ['date', 'before:5 years ago', 'after: 70 years ago'],
            'roles.*' => ['integer'],
            'roles'   => ['required','array',],
        ];
    }
}
