<?php

namespace Modules\Rider\Http\Controllers\Backend;

use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\Rider\DataTables\RidersDataTable;
use Modules\Rider\Repositories\RiderRepository;
use Modules\Rider\Http\Requests\Backend\RiderRequest;

class RiderController extends Controller
{
    protected $riderRepository;

    public function __construct(RiderRepository $riderRepository)
    {
        $this->riderRepository = $riderRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(RidersDataTable $datatable)
    {
        $data['result'] = $datatable->render('rider::index');
        return view('rider::index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $data['model'] = $this->riderRepository->newInstance();
        return view('rider::create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     * @param RiderRequest $request
     * @return Renderable
     */
    public function store(RiderRequest $request)
    {

        $this->riderRepository->store($request);
        return redirect()->route('rider.index')->with(['status' => 'success', 'message' => __('Created Successfully')]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $data['model'] = $this->riderRepository->show($id);
        return view('rider::show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $data['model'] = $this->riderRepository->show($id);
        return view('rider::edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     * @param RiderRequest $request
     * @param int $id
     * @return Renderable
     */
    public function update(RiderRequest $request, $id)
    {
        $this->riderRepository->update($request, $id);
        return redirect()->route('rider.edit', $id)->with(['status' => 'success', 'message' => __('Updated Successfully')]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->riderRepository->delete($id);
        return redirect()->route('rider.index')->with(['status' => 'success', 'message' => __('Deleted Successfully')]);
    }
}
