<?php

namespace Modules\Lines\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\City\Models\City;
use Spatie\Translatable\HasTranslations;

class Lines extends Model
{
    use HasFactory,HasTranslations,SoftDeletes;

    protected $table = 'lines';
    protected $fillable = ['name','start_city','end_city'];
    public $translatable = ['name'];


    public function startCity()
    {
        return $this->belongsTo(City::class,'start_city','id');
    }

    public function endCity()
    {
        return $this->belongsTo(City::class,'end_city','id');
    }

    public function stoppoints()
    {
        return $this->hasMany(LinePoints::class,'line_id')->orderBy('order');
    }
}
