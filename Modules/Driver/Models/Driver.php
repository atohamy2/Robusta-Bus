<?php

namespace Modules\Driver\Models;

use App\Traits\ActivityLog;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Driver\Models\Attributes\Attributes;
use Modules\Driver\Models\Relationships\Relationships;

class Driver extends Model
{
    use HasFactory,SoftDeletes,ActivityLog,Attributes,Relationships,HasApiTokens;

    protected $table = 'drivers';

    protected $fillable = [
        'first_name',
        'last_name',
        'country_id',
        'city_id',
        'birth_date',
        'gender',
        'phone_number',
        'national_id_number',
        'national_id_expiration_date',
        'personal_license_number',
        'license_expiration_date',
        'profile_picture'
    ];


}
