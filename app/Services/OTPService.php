<?php

namespace App\Services;

use App\Enums\Helpers;
use App\Repositories\OtpVerificationRepository;

class OTPService
{
    /**
     * Send OTP
     *
     * @param string $phoneNumber
     * @param string $message
     */
    public function sendOTP($phoneNumber, $message = null)
    {
        //
        return true;
    }

    /**
     * Send OTP Verification
     *
     * @param string $phoneNumber
     * @param string $message
     */
    public function sendOTPVerification($phoneNumber, $message = null)
    {
        app(OtpVerificationRepository::class)->update($phoneNumber, generateRandomNumber(Helpers::OTP_VERFIY_LENGHT));
        return $this->sendOTP($phoneNumber, $message);
    }




}
