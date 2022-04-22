<?php

namespace Modules\Country\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CountryRequest extends FormRequest
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
            'country_name.*'=>[
                'required',
                
            ],
           
            'country_code'=>[
                'required',
                'unique:countries,country_code,'.$this->country
            ],

            'currency_code'=>[
                'required',
               
            ],
            'language_id'=>[
                'required'
            ],
            'utc_offset'=>[
                'required'
            ],
            'flag'=>[
                'required'
            ]

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
            'country_name.*.required' => __('Country  Name field is required'),
            'country_code.required' => __('Country Code field is required'),
            'country_code.unique' => __('Country Code has already been taken.'),
            'currency_code.required' => __('currency code field is required'),
            'language_id.required' => __('language field is required'),
            'utc_offset.required' => __('UTC offset field is required'),
            'flag.required' => __('flag field is required'),
            
        ];
    }

}
