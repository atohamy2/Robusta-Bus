<?php

namespace Modules\Rider\Http\Controllers\API;

use Illuminate\Routing\Controller;
use Modules\Rider\Services\RiderService;
use Modules\Rider\Repositories\RiderRepository;
use Modules\Rider\Http\Requests\API\SendOTPRequest;
use Modules\Rider\Http\Requests\API\LoginOTPRequest;

class LoginController extends Controller
{
    protected $riderRepository;
    protected $riderService;

    public function __construct(RiderRepository $riderRepository, RiderService $riderService)
    {
        $this->riderRepository = $riderRepository;
        $this->riderService = $riderService;
    }

    /**
     * Send OTP
     * Send sms also save in OtpVerification on database
     */
    public function sendOTP(SendOTPRequest $rquest)
    {
        app(OTPService::class)->sendOTPVerification($rquest->phone_number);
        return responseSuccessMessage(__('Send Successfully'));
    }

    /**
     * Login OTP
     * check in OtpVerification table ,login, and return token
     */
    public function loginOTP(LoginOTPRequest $rquest)
    {
        // $this->riderService->login($rquest->phone_number);
    }

}
