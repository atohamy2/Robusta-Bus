<?php
namespace Modules\Vehicle\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleModelRequest extends FormRequest{
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
            'vehicle_model_name.*' => [
                'required',
            ],
            'vehicle_model_type' => [
                'required',
            ],
            'vehicle_brand_id'=>'required',
            'min_acceptance_year'=>'required'

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
            'vehicle_model_name.*.required' => __('Vehical Model Name field is required'),
            'vehicle_model_type.required' => __('Vehical Model Type field is required'),
            'vehicle_brand_id.required' => __('Vehical Brand Name field is required'),
            'min_acceptance_year.required' => __('Min Acceptance Year field is required'),

        ];
    }
}