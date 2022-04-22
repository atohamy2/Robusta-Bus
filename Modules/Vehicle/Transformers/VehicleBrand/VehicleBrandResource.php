<?php

namespace Modules\Vehicle\Transformers\VehicleBrand;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Vehicle\Transformers\VehicleModel\VehicleModelResource;

class VehicleBrandResource extends JsonResource
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
            'name' => $this->vehicle_brand_name,
            'type' => __($this->vehicle_brand_type),
            'models'=>VehicleModelResource::collection($this->models)->pluck('vehicle_model_name')
        ];
    }
}
