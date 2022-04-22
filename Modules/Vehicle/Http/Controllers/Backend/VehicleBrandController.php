<?php

namespace Modules\Vehicle\Http\Controllers\Backend;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Language\Repositories\LanguageRepository;
use Modules\Vehicle\Http\Requests\VehicleBrandRequest;
use Modules\Vehicle\Repositories\VehicleBrandRepository;

class VehicleBrandController extends Controller
{

    public $vehicleBrandRepository;
    public $languageRepository;

public function __construct( VehicleBrandRepository $vehicleBrandRepository , LanguageRepository $languageRepository)
{
    $this->vehicleBrandRepository=$vehicleBrandRepository;
    $this->languageRepository=$languageRepository;
}

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $data['result']=$this->vehicleBrandRepository->allWithPaginate();
        return view('vehicle::VehicleBrand.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $data['languages']=$this->languageRepository->all();
        $data['model']=$this->vehicleBrandRepository->newInstance();
        return view('vehicle::VehicleBrand.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(VehicleBrandRequest $request)
    {
        $this->vehicleBrandRepository->store($request);
        return redirect()->route('vehiclebrand.index')->with(['status' => 'success', 'message' => __('Created Successfully')]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $data['model']=$this->vehicleBrandRepository->show($id);
        
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $data['model']=$this->vehicleBrandRepository->show($id);
        $data['languages']=$this->languageRepository->all();
        return view('vehicle::VehicleBrand.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(VehicleBrandRequest $request, $id)
    {
        $this->vehicleBrandRepository->update($request,$id);
        return redirect()->route('vehiclebrand.index')->with(['status' => 'success', 'message' => __('Created Successfully')]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->vehicleBrandRepository->delete($id);
        return redirect()->route('vehiclebrand.index')->with(['status' => 'success', 'message' => __('Deleted Successfully')]);
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function search(Request $request)
    {
        $data['result'] = $this->vehicleBrandRepository->search($request);
        return view('vehicle::VehicleBrand.index')->with($data);
    }
}
