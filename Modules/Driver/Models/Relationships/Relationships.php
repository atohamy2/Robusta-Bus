<?php

namespace Modules\Driver\Models\Relationships;

use Modules\City\Models\City;
use Modules\Country\Models\Country;

trait Relationships
{
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
