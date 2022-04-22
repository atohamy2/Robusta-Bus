<?php

namespace Modules\Country\Database\Seeders;

use Illuminate\Database\Seeder;

class CountryDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CountriesSeederTableSeeder::class);
    }
}
