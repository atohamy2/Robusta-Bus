<?php

namespace Modules\Lines\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\City\Models\City;

class LinePoints extends Model
{
    use HasFactory;

    protected $table = 'line_points';
    protected $fillable = [];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
