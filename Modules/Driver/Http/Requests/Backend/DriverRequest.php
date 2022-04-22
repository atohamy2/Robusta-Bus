<?php

namespace Modules\Driver\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class DriverRequest extends FormRequest
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
            'first_name' => [
                'required'
            ],
            'last_name' => [
                'required'
            ],
            'phone_number' => [
                'required',
                'numeric',
            ],
            'country_id' => [
                'required'
            ],
            'city_id' => [
                'required'
            ],
            'birth_date' => [
                'required',
                'date'
            ],
            'gender'=>[
                'required'
            ],
            'national_id_number' => [
                'required'
            ],
            'national_id_expiration_date' => [
                'required',
                'date'
            ],
            'personal_license_number' => [
                'required'
            ],
            'license_expiration_date' => [
                'required',
                'date'
            ],
            'profile_picture' => [
                'required'
            ],




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
            'first_name.required' => __('First  Name field is required'),
            'last_name.required' => __('Last  Name field is required'),
            'phone_number.required' => __('phone number field is required'),
            'phone_number.numeric' => __('phone number field Must be Number'),
            'country_id.required' => __('Country  Name field is required'),
            'city_id.required' => __('City Name field is required'),
            'gender.required' => __('Gender field is required'),
            'birth_date.required' => __('Birth Date field is required'),
            'birth_date.date' => __('Birth Date field Must be Date'),
            'national_id_number.required' => __('National ID Number field is required'),
            'national_id_expiration_date.required' => __('National ID Expiration Date field is required'),
            'national_id_expiration_date.date' => __('National ID Expiration Date Must be Date'),
            'personal_license_number.required' => __('Personal License Number field is required'),
            'license_expiration_date.required' => __('License Expirtation Date field is required'),
            'license_expiration_date.date' => __('License Expirtation Date Must be Date'),
            'profile_picture.required' => __('Profile Picture field is required'),



        ];
    }
}
