<?php

namespace Modules\Vehicle\Transformers\VehicleModel;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Vehicle\Transformers\VehicleBrand\VehicleBrandResource;

class VehicleModelResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->vehicle_model_name,
            'type' => __($this->vehicle_model_type),
            'brand name'=>$this->brands->vehicle_brand_name,
            'acceptance'=>$this->min_acceptance_year
        ];
    }
}
