<?php

namespace Modules\Driver\Http\Controllers\API;

use Illuminate\Routing\Controller;
use Modules\Driver\Http\Requests\API\RegisterRequest;
use Modules\Driver\Repositories\DriverRepository;
use Modules\Driver\Services\DriverService;

class RegisterController extends Controller{

    protected $driverRepository;
    protected $driverService;
    public function __construct(DriverRepository $driverRepository,DriverService $driverService)
    {
        $this->driverRepository=$driverRepository;
        $this->driverService=$driverService;
    }

    public function register(RegisterRequest $request){
       
        $driver= $this->driverRepository->store($request);
        return  $this->driverService->loginPassport($driver,$request);
             
       
    }

}