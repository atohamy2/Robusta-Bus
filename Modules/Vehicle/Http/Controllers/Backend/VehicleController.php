<?php

namespace Modules\Vehicle\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\Vehicle\Http\Requests\VehicleRequest;
use Modules\Vehicle\Repositories\VehicleRepository;

class VehicleController extends Controller
{
    public $vehicleRepository;

    public function __construct(VehicleRepository $vehicleRepository)
    {
        $this->vehicleRepository = $vehicleRepository;
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $data['model'] = $this->vehicleRepository->newInstance();
        return view('vehicle::vehicle.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(VehicleRequest $request)
    {
        $this->vehicleRepository->store($request);
        return redirect()->back()->with(['status' => 'success', 'message' => __('Created Successfully')]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $data['model'] = $this->vehicleRepository->show($id);
        return view('vehicle::vehicle.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $data['model'] = $this->vehicleRepository->show($id);
        return view('vehicle::vehicle.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(VehicleRequest $request, $id)
    {
        $this->vehicleRepository->update($request, $id);
        return redirect()->back()->with(['status' => 'success', 'message' => __('Created Successfully')]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->vehicleRepository->delete($id);
        return redirect()->back()->with(['status' => 'success', 'message' => __('Deleted Successfully')]);
    }
}
