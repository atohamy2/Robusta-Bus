<?php

namespace Modules\Vehicle\Http\Controllers\API;

use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\Vehicle\Transformers\VehicleModel\VehicleModelResource;
use Modules\Vehicle\Repositories\VehicleModelRepository;

class VehicleModelController extends Controller
{
    protected $VehicleModelRepository;

    public function __construct(VehicleModelRepository $VehicleModelRepository)
    {
        $this->VehicleModelRepository = $VehicleModelRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function allModels()
    {
        $result = $this->VehicleModelRepository->all();
        return responseSuccessData(VehicleModelResource::collection($result));
    }
   

}
