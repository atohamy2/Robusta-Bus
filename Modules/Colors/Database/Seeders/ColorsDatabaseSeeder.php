<?php

namespace Modules\Colors\Database\Seeders;

use Illuminate\Database\Seeder;

class ColorsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $this->call(ColorsSeederTableSeeder::class);
    }
}
