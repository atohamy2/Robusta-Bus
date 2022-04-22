<?php

namespace Modules\Vehicle\Database\Seeders;

use Illuminate\Database\Seeder;


class VehicleDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(VehicleBrandSeederTableSeeder::class);
        $this->call(VehicleModelSeederTableSeeder::class);
    }
}
