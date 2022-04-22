<?php

namespace Modules\Country\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;


class CountryFlagAndCodeResource extends JsonResource
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
            'country_code' => $this->country_code,
            'flag' => $this->flag,

        ];
    }
}
