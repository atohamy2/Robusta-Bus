<?php

namespace Modules\Vehicle\Http\Controllers\Backend;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Language\Repositories\LanguageRepository;
use Modules\Vehicle\Http\Requests\VehicleModelRequest;
use Modules\Vehicle\Repositories\VehicleModelRepository;

class VehicleModelController extends Controller
{

    public $vehicleModelRepository;
    public $languageRepository;

public function __construct( VehicleModelRepository $vehicleModelRepository , LanguageRepository $languageRepository)
{
    $this->vehicleModelRepository=$vehicleModelRepository;
    $this->languageRepository=$languageRepository;
}

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $data['result']=$this->vehicleModelRepository->allWithPaginate();
        return view('vehicle::VehicleModel.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $data['languages']=$this->languageRepository->all();
        $data['model']=$this->vehicleModelRepository->newInstance();
       
        return view('vehicle::VehicleModel.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(VehicleModelRequest $request)
    {
        $this->vehicleModelRepository->store($request);
        return redirect()->route('vehiclemodel.index')->with(['status' => 'success', 'message' => __('Created Successfully')]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $data['model']=$this->vehicleModelRepository->show($id);
        return view('vehicle::VehicleModel.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $data['model']=$this->vehicleModelRepository->show($id);
        $data['languages']=$this->languageRepository->all();
        return view('vehicle::VehicleModel.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(VehicleModelRequest $request, $id)
    {
        $this->vehicleModelRepository->update($request,$id);
        return redirect()->route('vehiclemodel.index')->with(['status' => 'success', 'message' => __('Created Successfully')]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->vehicleModelRepository->delete($id);
        return redirect()->route('vehiclemodel.index')->with(['status' => 'success', 'message' => __('Deleted Successfully')]);
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function search(Request $request)
    {
        $data['result'] = $this->vehicleModelRepository->search($request);
        return view('vehicle::VehicleModel.index')->with($data);
    }
}
