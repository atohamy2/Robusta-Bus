<?php

namespace Modules\Driver\Http\Controllers\API;

use App\Services\OTPService;
use App\Repositories\OtpVerificationRepository;
use Illuminate\Routing\Controller;
use Modules\Driver\Http\Requests\API\LoginOTPRequest;
use Modules\Driver\Http\Requests\API\SendOTPRequest;

class LoginController extends Controller{

    protected $otpVerificationRepository;
    public function __construct(otpVerificationRepository $otpVerificationRepository)
    {
        $this->otpVerificationRepository=$otpVerificationRepository;
    }

    public function sendOTP(SendOTPRequest $request){
        app(OTPService::class)->sendOTPVerification($request->phone_number);
        return responseSuccessMessage(__('Send Successfully'));
    }

    public function LoginOTP(LoginOTPRequest $request){

        $data= $this->otpVerificationRepository->find($request->phone_number,$request->otp_code);
        if($data){

            return responseSuccessMessage(__('Login Successfully'));
        }
        return responseErrorMessage(__('Login falied'));
    }
}