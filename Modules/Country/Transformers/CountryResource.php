<?php

namespace Modules\Country\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\City\Transformers\CityResource;

class CountryResource extends JsonResource
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
            'country_name' => $this->country_name,
            'country_code' => $this->country_code,
            'country_iso_code' => $this->country_iso_code,
            'currency_code' => $this->currency_code,
            'language_id' => $this->langauge->language_name,
            'utc_offset' => $this->utc_offset,
            'flag' => $this->flag,
            'cities'=>CityResource::collection($this->cities)->pluck('city_name')

        ];
    }
}
