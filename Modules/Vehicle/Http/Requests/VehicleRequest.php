<?php

namespace Modules\Vehicle\Http\Requests;

use App\Enums\Helpers;
use Illuminate\Foundation\Http\FormRequest;

class VehicleRequest extends FormRequest
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
            'driver_id' => ['required', 'numeric', 'exists:drivers,id'],
            'vehicle_brand_id' => ['required', 'numeric', 'exists:vehicle_brands,id'],
            'vehicle_model_id' => ['required', 'numeric', 'exists:vehicle_models,id'],
            'vehicle_color_id' => ['required', 'numeric', 'exists:colors,id'],
            'year' => ['required', 'date_format:' . Helpers::YEAR_FORMAT],
            'licence_number' => ['required'],
            'licence_expiration_date' => ['required', 'date_format:' . Helpers::DATE_FORMAT],
            'plate_number' => ['required', 'unique:vehicles,plate_number,' . $this->vehicle],
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
            //
        ];
    }
}
