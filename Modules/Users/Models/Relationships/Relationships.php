<?php

namespace Modules\Users\Models\Relationships;

use Modules\Country\Models\Country;

trait Relationships
{
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
