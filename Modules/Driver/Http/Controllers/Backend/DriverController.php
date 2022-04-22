<?php

namespace Modules\Driver\Http\Controllers\Backend;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Driver\Http\Requests\Backend\DriverRequest;
use Modules\Driver\Repositories\DriverRepository;
use Modules\Vehicle\Repositories\VehicleRepository;

class DriverController extends Controller
{
    protected $driverRepository;
    protected $vehicleRepository;

    public function __construct(DriverRepository $driverRepository, VehicleRepository $vehicleRepository)
    {
        $this->driverRepository = $driverRepository;
        $this->vehicleRepository = $vehicleRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $data['result'] = $this->driverRepository->allWithPaginate();
        return view('driver::index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $data['model'] = $this->driverRepository->newInstance();
        return view('driver::create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     * @param DriverRequest $request
     * @return Renderable
     */
    public function store(DriverRequest $request)
    {

        $this->driverRepository->store($request);
        return redirect()->route('driver.index')->with(['status' => 'success', 'message' => __('Created Successfully')]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $data['model'] = $this->driverRepository->show($id);
        return view('driver::show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $data['model'] = $this->driverRepository->show($id);
        $data['vehicles'] = $this->vehicleRepository->getAllByDriverId($id);
        return view('driver::edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     * @param DriverRequest $request
     * @param int $id
     * @return Renderable
     */
    public function update(DriverRequest $request, $id)
    {
        $this->driverRepository->update($request, $id);
        return redirect()->route('driver.index')->with(['status' => 'success', 'message' => __('Updated Successfully')]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->driverRepository->delete($id);
        return redirect()->route('driver.index')->with(['status' => 'success', 'message' => __('Deleted Successfully')]);
    }
}
