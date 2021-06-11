<?php

namespace App\Http\Requests\Frontend;

use App\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreUserRequest extends FormRequest
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
            'phone_number'     => [
                'required',
                'regex:/^([0-9\s\-\+\(\)]*)$/',
                'min:10'
            ],
            'email'    => [
                'required',
                'unique:users',
            ],
            'gender'    => [
                'required',
            ],
            'kulliyyah'    => [
                'required',
            ],
            'password' => [
                'required',
            ],
            'roles.*'  => [
                'integer',
            ],
            'roles'    => [
                'required',
                'array',
            ],
        ];
    }
}
