<?php

namespace App\Http\Requests\Frontend;

use App\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateUserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'first_name'     => [
                'required',
            ],
            'last_name'     => [
                'required',
            ],
            'email'   => [
                'required',
                'unique:users,email,' . request()->route('user')->id,
            ],
            'phone_number'     => [
                'required',
                'regex:/^([0-9\s\-\+\(\)]*)$/',
                'min:10'
            ],
            'roles.*' => [
                'integer',
            ],
            'roles'   => [
                'required',
                'array',
            ],
        ];
    }
}
