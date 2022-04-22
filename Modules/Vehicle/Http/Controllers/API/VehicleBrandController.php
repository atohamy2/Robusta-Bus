<?php

namespace Modules\Vehicle\Http\Controllers\API;

use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\Vehicle\Repositories\VehicleBrandRepository;
use Modules\Vehicle\Transformers\VehicleBrand\VehicleBrandResource;
use Modules\Vehicle\Transformers\VehicleBrand\VehicleBrandWithModelResource;

class VehicleBrandController extends Controller
{
    protected $VehicleBrandRepository;

    public function __construct(VehicleBrandRepository $VehicleBrandRepository)
    {
        $this->VehicleBrandRepository = $VehicleBrandRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function allBrands()
    {
        $result = $this->VehicleBrandRepository->all();
        return responseSuccessData(VehicleBrandResource::collection($result));
    }
 

}
