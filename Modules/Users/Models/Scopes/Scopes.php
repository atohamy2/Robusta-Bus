<?php

namespace Modules\Users\Models\Scopes;

use App\Scopes\UserCountryScope;

trait Scopes
{
    /**
     * The "booted" method of the model.
     * To get all data base on company or branch
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new UserCountryScope(auth()->user()));
    }
}
