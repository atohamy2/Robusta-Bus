<?php

namespace Modules\Vehicle\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Vehicle\Enums\Vehicle;
use Modules\Vehicle\Models\VehicleBrand;

class VehicleBrandSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(Vehicle::vehicle_brand_name as $item){

            VehicleBrand::create([
                'vehicle_brand_name'=>$item,
                'vehicle_brand_type'=>'car',
            ]);
        }
    }
}
