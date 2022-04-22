<?php

namespace Modules\Colors\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Colors\Enums\Color as EnumsColor;
use Modules\Colors\Models\Color;

class ColorsSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(EnumsColor::color as $item)
        Color::create([
            'color_name'=>[
                'ar'=>$item['ar'],
                'en'=>$item['en']
            ],
            'color_code'=>$item['code']
        ]);
    }
}
