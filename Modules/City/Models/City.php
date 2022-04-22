<?php

namespace Modules\City\Models;

use App\Traits\ActivityLog;
use Modules\Country\Models\Country;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory, HasTranslations,SoftDeletes;

    protected $table = 'cities';

    protected $fillable = ['city_name'];
    public $translatable = ['city_name'];

}
