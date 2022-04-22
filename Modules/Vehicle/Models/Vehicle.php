<?php

namespace Modules\Vehicle\Models;

use Modules\Driver\Models\Driver;
use Illuminate\Database\Eloquent\Model;
use Modules\Vehicle\Models\VehicleBrand;
use Modules\Vehicle\Models\VehicleModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Colors\Models\Color;

class Vehicle extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'vehicles';

    protected $fillable = [
        'driver_id',
        'vehicle_brand_id',
        'vehicle_model_id',
        'vehicle_color_id',
        'year',
        'licence_number',
        'licence_expiration_date',
        'plate_number'
    ];

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function vehicleBrand()
    {
        return $this->belongsTo(VehicleBrand::class);
    }

    public function vehicleModel()
    {
        return $this->belongsTo(VehicleModel::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class, 'vehicle_color_id');
    }


}
