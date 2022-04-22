<?php

namespace Modules\Roles\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
        return [
            'name' => [
                'required',
                'unique:roles,name,'.$this->role
            ],
            'permissions' => ['required', 'array']
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => __('Role Name field is required'),
            'name.unique' => __('Role Name has already been taken.'),
            'permissions.required' => __('Role Permissions field is required'),
        ];
    }

}
