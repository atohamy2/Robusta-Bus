<?php

namespace Modules\Driver\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\City\Transformers\CityResource;
use Modules\Country\Transformers\CountryResource;

class DriverResource extends JsonResource
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
            'gender' => $this->gender,
            'birth_date' => $this->birth_date,
            'profile_picture' => $this->profile_picture,
            'national_id_number' => $this->national_id_number,
            'national_id_expiration_date' => $this->national_id_expiration_date,
            'personal_license_number' => $this->personal_license_number,
            'license_expiration_date' => $this->license_expiration_date,
            'status' => $this->status,
        ];
    }
}
