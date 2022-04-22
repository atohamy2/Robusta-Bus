<?php

namespace Modules\City\Http\Controllers\API;

use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\City\Repositories\CityRepository;
use Modules\City\Transformers\CityResource;

class CityController extends Controller
{
    protected $cityRepository;

    public function __construct(CityRepository $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function all()
    {
        $result = $this->cityRepository->all();
        return responseSuccessData(CityResource::collection($result));
    }

}
