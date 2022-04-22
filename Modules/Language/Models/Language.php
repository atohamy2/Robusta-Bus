<?php

namespace Modules\Language\Models;

use App\Traits\ActivityLog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Language extends Model
{
    use HasFactory, ActivityLog;

    protected $table = 'languages';

    protected $fillable = ['language_name', 'language_code', 'direction'];
}
