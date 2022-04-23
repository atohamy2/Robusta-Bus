<?php

namespace Modules\Trips\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\City\Models\City;
use Spatie\Translatable\HasTranslations;

class BookSeat extends Model
{
    use HasFactory,HasTranslations;

    protected $table = 'book_seats';

    protected $fillable = [];
    public $translatable = ['name'];

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    public function fromcity()
    {
        return $this->belongsTo(City::class,'from','id');
    }

    public function tocity()
    {
        return $this->belongsTo(City::class,'to','id');
    }
}
