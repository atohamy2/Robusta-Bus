<?php

namespace Modules\Rider\Http\Controllers\API;

use Illuminate\Routing\Controller;
use Modules\Rider\Services\RiderService;
use Modules\Rider\Repositories\RiderRepository;
use Modules\Rider\Http\Requests\API\RegisterRequest;

class RegisterController extends Controller
{
    protected $riderRepository;
    protected $riderService;

    public function __construct(RiderRepository $riderRepository, RiderService $riderService)
    {
        $this->riderRepository = $riderRepository;
        $this->riderService = $riderService;
    }

    /**
     * Normal Register
     *
     */
    public function normal(RegisterRequest $rquest)
    {
        $rider = $this->riderRepository->store($rquest);
        return $this->riderService->loginPassport($rider, $rquest);
    }

}
