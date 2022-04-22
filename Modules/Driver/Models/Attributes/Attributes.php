<?php

namespace Modules\Driver\Models\Attributes;

trait Attributes
{
    /**
     * Get the rider name
     *
     * @return string
     */
    public function getDriverNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }
}
