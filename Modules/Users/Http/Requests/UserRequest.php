<?php

namespace Modules\Users\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'GET': {
                return [];
            }
            case 'DELETE': {
                return [];
            }
            case 'POST': {
                return [
                    'name' => ['required'],
                    'email' => ['required', 'unique:users,email'],
                    'role_id' => ['required'],
                    'country_id' => ['nullable'],
                    'password' => ['required', 'min:8'],
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'name' => ['required'],
                    'email' => ['required', 'unique:users,email,'.$this->user],
                    'role_id' => ['required'],
                    'country_id' => ['nullable'],
                    'password' => ['nullable', 'min:8'],
                ];
            }
            default:
                break;
        }
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => __('Name field is required'),
            'email.required' => __('Email field is required'),
            'email.unique' => __('Email has already been taken.'),
            'role_id.required' => __('Role field is required'),
            'password.required' => __('Password field is required'),
            'password.min' => __('Password field must be at least :min'),
        ];
    }

}
