<?php

namespace Modules\Trips\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Lines\Models\Lines;
use Spatie\Translatable\HasTranslations;

class Trip extends Model
{
    use HasFactory,HasTranslations,SoftDeletes;

    protected $table = 'trips';

    protected $fillable = ['line_id','name','bus_number','datetime'];

    public $translatable = ['name'];

    public function linedata()
    {
        return $this->belongsTo(Lines::class,'line_id');
    }
}
