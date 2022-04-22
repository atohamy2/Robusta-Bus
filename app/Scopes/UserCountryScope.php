<?php
namespace App\Scopes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;

class UserCountryScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        if(auth()->check() && auth()->user()->country_id)
        {
            $builder->where('country_id', auth()->user()->country_id);
        }
    }
}
