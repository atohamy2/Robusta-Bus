<?php

namespace Modules\City\Http\Controllers\Backend;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\City\Http\Requests\CityRequest;
use Modules\City\Repositories\CityRepository;
use Modules\Language\Repositories\LanguageRepository;

class CityController extends Controller
{

    protected $CityRepository;
    protected $LanguageRepository;

    public function __construct(CityRepository $CityRepository,LanguageRepository $LanguageRepository)
    {
        $this->CityRepository = $CityRepository;
        $this->LanguageRepository = $LanguageRepository;
        
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $data['result'] = $this->CityRepository->allWithPaginate();
        return view('city::index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $data['model'] = $this->CityRepository->newInstance();
        $data['languages']=$this->LanguageRepository->all();
       
        return view('city::create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CityRequest $request)
    {
        $this->CityRepository->store($request);
        return redirect()->route('city.index')->with(['status' => 'success', 'message' => __('Created Successfully')]);
    }
    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $data['model'] = $this->CityRepository->show($id);
        return view('city::show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $data['model'] = $this->CityRepository->show($id);
        $data['languages']=$this->LanguageRepository->all();

        return view('city::edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(CityRequest $request, $id)
    {
        
        $this->CityRepository->update($request, $id);
        return redirect()->route('city.index')->with(['status' => 'success', 'message' => __('Updated Successfully')]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {

        $this->CityRepository->delete($id);
        return redirect()->route('city.index')->with(['status' => 'success', 'message' => __('Deleted Successfully')]);
    }

    public function search(CityRequest $request)
    {
        $data['result'] = $this->CityRepository->search($request);
        return view('city::index')->with($data);
    }
}
