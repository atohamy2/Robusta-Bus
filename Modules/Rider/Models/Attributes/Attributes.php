<?php

namespace Modules\Rider\Models\Attributes;

trait Attributes
{
    /**
     * Get the rider name
     *
     * @return string
     */
    public function getRiderNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }

    /**
     * Get the rider image
     *
     * @return string
     */
    public function getRiderImageUrlAttribute()
    {
        if($this->photo)
        {
            return url('uploads/riders/'.$this->photo);
        }
        return url('uploads/default-avatar.png');
    }

    /**
     * Set the Photo
     *
     * @param  string  $value
     * @return string
     */
//    public function setPhotoAttribute($value)
//    {
//        if(!$value)
//        {
//            return $value;
//        }
//    }
}
