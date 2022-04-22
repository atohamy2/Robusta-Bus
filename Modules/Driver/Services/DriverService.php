<?php

namespace Modules\Driver\Services;

use App\Enums\Helpers;
use Carbon\Carbon;
use Modules\Driver\Transformers\DriverResource;

class DriverService
{
    /**
     * Login Passport
     *
     * @return string
     */
    public function loginPassport($driver, $request)
    {
        $tokenResult = $driver->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me) {
            $token->expires_at = now()->addMonths(Helpers::TOKEN_EXPIRED_AFTER_NUMBER);
        }
        $token->save();

        $response = [
            'token' => [
                'access_token' => 'Bearer ' . $tokenResult->accessToken,
                'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString(),
            ],
            'profile' => new DriverResource($driver),
        ];

        return responseSuccessData($response);
    }

    /**
     * Logout Passport
     *
     * @return string
     */
    public function logoutPassport($driver, $request)
    {
        $driver->token()->revoke();
        return responseSuccessMessage(__('Logout Successfully'));
    }
}
