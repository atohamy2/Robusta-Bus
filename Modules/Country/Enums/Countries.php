<?php

namespace Modules\Country\Enums;

use BenSampo\Enum\Enum;


final class Countries extends Enum
{
    const countries=   [
        [
            'country_name' => [
                'ar' => 'مصر',
                'en' => 'Egypt'
            ],
            'country_code' => '+20',
            'country_iso_code' => 'EGY',
            'currency_code' => 'EGP',
            'language_id' => '1',
            'utc_offset' => 'UTC+2'
        ],
        [
            'country_name' => [
                'ar' => 'المملكة العربية السعودية',
                'en' => 'Saudi Arabia'
            ],
            'country_code' => '+966',
            'country_iso_code' => 'KSA',
            'currency_code' => 'RSD',
            'language_id' => '1',
            'utc_offset' => 'UTC+3'
        ]
       
    ];
}
        