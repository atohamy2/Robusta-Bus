<?php

namespace Modules\Lines\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LinesRequest extends FormRequest
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
            'name.*'=>[

                'required'

            ],
            'start_city.*'=>[

                'required'

            ],
            'end_city.*'=>[

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
            'name.*.required' => __('Line Name field is required'),
            'start_city.*.required' => __('Start City field is required'),
            'end_city.*.required' => __('End City field is required'),

        ];
    }

}
