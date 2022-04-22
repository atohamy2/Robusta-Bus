<?php

namespace Modules\Users\Models\Attributes;

use App\Traits\ActivityLog;
use Spatie\Activitylog\Traits\CausesActivity;

trait Attributes
{
    use  CausesActivity;

    /**
     * Get the Role name
     *
     * @return object
     */
    public function getRoleAttribute()
    {
        return $this->roles()->first();
    }

    /**
     * Set the user's password bcrypt.
     *
     * @param  string  $value
     * @return void
     */
    public function setPasswordAttribute($password)
    {
        if ($password !== null & $password !== "") {
            $this->attributes['password'] = bcrypt($password);
        }
    }

    /**
     * Get the Activity Log
     *
     * @return array
     */

}
