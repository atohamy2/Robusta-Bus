<?php

namespace Modules\Vehicle\Models;

use App\Traits\ActivityLog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class VehicleBrand extends Model
{
    use HasFactory,HasTranslations,ActivityLog,SoftDeletes;

    protected $table = 'vehicle_brands';

    protected $fillable = ['vehicle_brand_name','vehicle_brand_type'];
    
    public $translatable=['vehicle_brand_name'];


    public function models(){
        return $this->hasMany(VehicleModel::class);
    }
}
