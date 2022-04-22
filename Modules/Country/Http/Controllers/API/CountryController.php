<?php

namespace Modules\Country\Http\Controllers\API;

use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\Country\Repositories\CountryRepository;
use Modules\Country\Transformers\CountryFlagAndCodeResource;
use Modules\Country\Transformers\CountryResource;

class countryController extends Controller
{
    protected $countryRepository;

    public function __construct(CountryRepository $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function all()
    {
        $result = $this->countryRepository->all();
        return responseSuccessData(CountryResource::collection($result));
    }
    public function flagsAndCodes(){
        
        $result=$this->countryRepository->all();
        return responseSuccessData(CountryFlagAndCodeResource::collection($result));
    }

}
