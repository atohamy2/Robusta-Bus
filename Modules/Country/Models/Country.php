<?php

namespace Modules\Country\Models;

use App\Traits\ActivityLog;
use Modules\Language\Models\Language;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\City\Models\City;

class Country extends Model
{
    use HasFactory, HasTranslations, ActivityLog,SoftDeletes;

    protected $table = 'countries';
    protected $fillable = ['country_name','country_code','country_iso_code','currency_code','language_id','utc_offset','flag'];
    public $translatable = ['country_name','currency_codes'];

    public function langauge(){
        return $this->hasOne(Language::class,'id','language_id');
    }
    public function cities(){
        return $this->hasMany(City::class);
    }
}
