<?php

namespace Modules\Country\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Country\Models\Country;
use Modules\Language\Models\Language;
use Modules\Country\Enums\Countries;
class CountriesSeederTableSeeder extends Seeder
{


   


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Countries::countries as $contry) {

            Country::create($contry);
        }
    }
}
