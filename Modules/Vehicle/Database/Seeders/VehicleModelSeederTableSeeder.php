<?php

namespace Modules\Vehicle\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Vehicle\Enums\Vehicle;
use Modules\Vehicle\Models\VehicleModel;

class VehicleModelSeederTableSeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<=3;$i++){
            VehicleModel::create([
               'vehicle_model_name'=> Vehicle::vehicle_model_name[$i],
               'vehicle_model_type'=> 'sedan',
               'vehicle_brand_id'=>$i+1,
               'min_acceptance_year'=>2015
            ]);
        }
    }
}
