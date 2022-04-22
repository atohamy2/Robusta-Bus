<?php
namespace Modules\Vehicle\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleBrandRequest extends FormRequest{
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
            'vehicle_brand_name.*' => [
                'required',
            ],
            'vehicle_brand_type' => [
                'required',
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
            'vehicle_brand_name.*.required' => __('Vehical Brand Name field is required'),
            'vehicle_brand_type.required' => __('Vehical Brand Type field is required'),
        ];
    }
}
