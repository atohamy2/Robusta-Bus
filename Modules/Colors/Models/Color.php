<?php

namespace Modules\Colors\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class Color extends Model
{
    use HasFactory , HasTranslations;

    protected $table = 'colors';

    protected $fillable = ['color_name','color_code'];

    public $translatable = ['color_name'];
}
