<?php

namespace Modules\Rider\Models;

use App\Traits\ActivityLog;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Modules\Rider\Models\Scopes\Scopes;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Rider\Models\Attributes\Attributes;
use Modules\Rider\Models\Relationships\Relationships;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rider extends Model
{
    use HasFactory, SoftDeletes, Relationships, Scopes, Attributes, ActivityLog, HasApiTokens;

    protected $table = 'riders';

    protected $fillable = ['country_id', 'city_id', 'first_name', 'last_name', 'phone_number', 'email', 'gender', 'birth_date', 'photo'];
}
