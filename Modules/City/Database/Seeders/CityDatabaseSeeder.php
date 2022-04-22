<?php

namespace Modules\City\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\City\Enums\Cities;
use Modules\City\Models\City;

class CityDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Cities::egypt_cities as $item) {
            City::create([
                'city_name'=>$item
            ]);
        }
    }
}
