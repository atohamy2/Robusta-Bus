<?php

namespace Modules\Rider\Services;

use App\Enums\Helpers;
use Carbon\Carbon;
use Modules\Rider\Transformers\RiderResource;

class RiderService
{
    /**
     * Login Passport
     *
     * @return string
     */
    public function loginPassport($rider, $request)
    {
        $tokenResult = $rider->createToken('Personal Access Token');
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
            'profile' => new RiderResource($rider),
        ];

        return responseSuccessData($response);
    }

    /**
     * Logout Passport
     *
     * @return string
     */
    public function logoutPassport($rider, $request)
    {
        $rider->token()->revoke();
        return responseSuccessMessage(__('Logout Successfully'));
    }
}
