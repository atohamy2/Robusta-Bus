<?php

namespace Modules\Rider\Http\Requests\API;

use App\Enums\Gender;
use App\Enums\Helpers;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterRequest extends FormRequest
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
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'phone_number' => ['required', 'unique:riders,phone_number'],
            'email' => ['nullable', 'email', 'unique:riders,email'],
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
            'country_id.required' => __('The Country field is required.'),
            'country_id.numeric' => __('The Country field must be a number.'),
            'city_id.required' => __('The City field is required.'),
            'city_id.numeric' => __('The City field must be a number.'),
            'first_name.required' => __('The First Name field is required.'),
            'first_name.string' => __('The First Name must be a string.'),
            'last_name.required' => __('The Last Name field is required.'),
            'last_name.string' => __('The Last Name must be a string.'),
            'phone_number.required' => __('The Phone Number field is required.'),
            'phone_number.unique' => __('The Phone Number field has already been taken.'),
            'email.email' => __('The Email field must be a valid email address.'),
            'email.unique' => __('The Email field has already been taken.'),
            'gender.required' => __('The Gender field is required.'),
            'gender.in' => __('The selected Gender is invalid.'),
            'birth_date.required' => __('The Birth Date field is required.'),
            'birth_date.date_format' => __('The Birth Date field does not match the format :format.'),
        ];
    }

    /**
     * Response on failure
     *
     * @param array $validator
     * @return Response
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(validationErrors($validator->errors()->all()));
    }

}
