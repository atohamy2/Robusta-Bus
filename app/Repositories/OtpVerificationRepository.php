<?php

namespace App\Repositories;

use App\Enums\Helpers;
use App\Models\OtpVerification;

class OtpVerificationRepository
{
    public function update($phoneNumber, $generateRandomNumber)
    {
        return OtpVerification::updateOrCreate(['phone_number' => $phoneNumber, 'opt_code' => $generateRandomNumber, 'expiration_date' => now()->addMinutes(Helpers::EXPIRATION_DATE_NUMBER)]);
    }

    public function find($phoneNumber, $generateRandomNumber)
    {
        return OtpVerification::where(['phone_number' => $phoneNumber, 'opt_code' => $generateRandomNumber])->where('expiration_date', '<=', now())->first();
    }

    public function delete($id)
    {
        return OtpVerification::find($id)->delete();
    }
}
