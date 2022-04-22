<?php

namespace Modules\Rider\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\City\Transformers\CityResource;
use Modules\Country\Transformers\CountryResource;

class RiderResource extends JsonResource
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
            'country' => new CountryResource($this->country),
            'city' => new CityResource($this->city),
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'phone_number' => $this->phone_number,
            'email' => $this->email,
            'gender' => $this->gender,
            'birth_date' => $this->birth_date,
            'photo_url' => $this->rider_image_url,
        ];
    }
}
