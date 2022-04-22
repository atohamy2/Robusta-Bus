<?php

namespace Modules\Vehicle\Models;

use App\Traits\ActivityLog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class VehicleModel extends Model
{
    use HasFactory,HasTranslations,ActivityLog,SoftDeletes;

    protected $table = 'vehicle_models';

    protected $fillable = ['vehicle_model_name','vehicle_model_type','vehicle_brand_id','min_acceptance_year'];

    public $translatable=['vehicle_model_name'];

    public function brands(){
      return  $this->belongsTo(VehicleBrand::class,'vehicle_brand_id','id');
    }
}
