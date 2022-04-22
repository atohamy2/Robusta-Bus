<?php

namespace Modules\Driver\Http\Requests\API;
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
            'first_name' => ['required'],
            'last_name' => ['required'],
            'phone_number' => ['required'],
            'birth_date' => ['required','date_format:'.Helpers::DATE_FORMAT],
            'gender' => ['required'],
            'national_id_number' => ['required'],
            'national_id_expiration_date' => ['required','date_format:'.Helpers::DATE_FORMAT],
            'personal_license_number' => ['required'],
            'license_expiration_date' => ['required','date_format:'.Helpers::DATE_FORMAT],
            'profile_picture' => ['required'],
           
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
            'gender.required' => __('Gender field is required'),
            'birth_date.required' => __('Birth Date field is required'),
            'birth_date.date_format' => __('Birth Date field date format must be :date_format'),
            'national_id_number.required' => __('National ID Number field is required'),
            'national_id_expiration_date.required' => __('National ID Expiration  Date field is required'),
            'national_id_expiration_date.date_format' => __('National ID Expiration  Date field format must be :date_format'),
            'personal_license_number.required' => __('Personal License Number field is required'),
            'license_expiration_date.required' => __('Personal License Expiration  Date field is required'),
            'license_expiration_date.date_format' => __('Personal License Expiration  Date field format must be :date_format'),
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
