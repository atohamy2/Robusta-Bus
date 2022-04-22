<?php

namespace Modules\Language\Http\Controllers\API;

use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\Language\Repositories\LanguageRepository;
use Modules\Language\Transformers\LanguageResource;

class LanguageController extends Controller
{
    protected $languageRepository;

    public function __construct(LanguageRepository $languageRepository)
    {
        $this->languageRepository = $languageRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function all()
    {
        $result = $this->languageRepository->all();
        return responseSuccessData(LanguageResource::collection($result));
    }

}
