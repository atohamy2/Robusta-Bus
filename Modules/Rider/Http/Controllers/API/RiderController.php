<?php

namespace Modules\Rider\Http\Controllers\API;

use Illuminate\Routing\Controller;
use Modules\Rider\Repositories\RiderRepository;

class RiderController extends Controller
{
    protected $riderRepository;

    public function __construct(RiderRepository $riderRepository)
    {
        $this->riderRepository = $riderRepository;
    }
}
