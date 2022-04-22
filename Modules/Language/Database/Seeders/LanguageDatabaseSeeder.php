<?php

namespace Modules\Language\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Language\Models\Language;

class LanguageDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::insert([
            [
                'language_name' => "English",
                'language_code' => "en",
                'direction' => "ltr",
            ],
            [
                'language_name' => "Arabic",
                'language_code' => "ar",
                'direction' => "rtl",
            ]
        ]);
    }
}
