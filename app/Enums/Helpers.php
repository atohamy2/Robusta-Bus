<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class Helpers extends Enum
{
    /**
     * Dates Formated
     */
    const DATE_FORMAT = 'Y-m-d';
    const DATE_TIME_24_FORMAT = 'Y-m-d H:i:s';
    const DATE_TIME_12_FORMAT = 'Y-m-d h:i A';
    const YEAR_FORMAT = 'Y';

    /**
     * Commons
     */
    const OTP_VERFIY_LENGHT = 4;
    const TOKEN_EXPIRED_AFTER_NUMBER = 6;
    const EXPIRATION_DATE_NUMBER = 2;
}
