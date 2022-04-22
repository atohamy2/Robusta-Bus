<?php

namespace Modules\Rider\Http\Requests\Backend;

use App\Enums\Gender;
use App\Enums\Helpers;
use Illuminate\Foundation\Http\FormRequest;

class RiderRequest extends FormRequest
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
            'country_id' => ['required', 'numeric'],
            'city_id' => ['required', 'numeric'],
            'first_name' => ['required'],
            'last_name' => ['required'],
            'phone_number' => ['required', 'unique:riders,phone_number,'.$this->rider],
            'email' => ['nullable', 'email', 'unique:riders,email,'.$this->rider],
            'gender' => ['required', 'in:'.implode(',', Gender::getValues())],
            'birth_date' => ['required', 'date_format:'.Helpers::DATE_FORMAT],
            'photo' => ['nullable']
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
            'country_id.required' => __('Country field is required'),
            'country_id.numeric' => __('Country field must be a numeric'),
            'city_id.required' => __('City field is required'),
            'city_id.numeric' => __('City field must be a numeric'),
            'first_name.required' => __('First Name field is required'),
            'last_name.required' => __('Last Name field is required'),
            'phone_number.required' => __('Phone Number field is required'),
            'phone_number.unique' => __('Phone Number has already been taken.'),
            'email.unique' => __('Email has already been taken.'),
            'gender.required' => __('Gender field is required'),
            'gender.in' => __('Gender field must be in :in'),
            'birth_date.required' => __('Birth Date field is required'),
            'birth_date.date_format' => __('Birth Date field date format must be :date_format'),
        ];
    }

}
