<?php

namespace Modules\Language\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LanguageRequest extends FormRequest
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
            'language_name' => [
                'required',
                'unique:languages,language_name,'.$this->language
            ],
            'language_code' => [
                'required',
                'unique:languages,language_code,'.$this->language
            ],
            'direction' => ['required']
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
            'language_name.required' => __('Language Name field is required'),
            'language_name.unique' => __('Language Name has already been taken.'),
            'language_code.required' => __('Language Code field is required'),
            'language_code.unique' => __('Language Code has already been taken.'),
        ];
    }

}
