<?php

namespace Modules\Country\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\Country\Http\Requests\CountryRequest;
use Modules\Country\Repositories\CountryRepository;
use Modules\Language\Repositories\LanguageRepository;

class CountryController extends Controller
{
    protected $CountryRepository;
    protected $LanguageRepository;

    public function __construct(CountryRepository $CountryRepository,LanguageRepository $LanguageRepository)
    {
        $this->CountryRepository = $CountryRepository;
        $this->LanguageRepository=$LanguageRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $data['result'] = $this->CountryRepository->allWithPaginate();
        return view('country::index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $data['model'] = $this->CountryRepository->newInstance();
        $data['languages']=$this->LanguageRepository->all();

        return view('country::create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CountryRequest $request)
    {
        $this->CountryRepository->store($request);
        return redirect()->route('country.index')->with(['status' => 'success', 'message' => __('Created Successfully')]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $data['model'] = $this->CountryRepository->show($id);
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $data['model'] = $this->CountryRepository->show($id);
        $data['languages']=$this->LanguageRepository->all();

        return view('country::edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(CountryRequest $request, $id)
    {
        $this->CountryRepository->update($request, $id);
        return redirect()->route('country.index')->with(['status' => 'success', 'message' => __('Updated Successfully')]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->CountryRepository->delete($id);
        return redirect()->route('country.index')->with(['status' => 'success', 'message' => __('Deleted Successfully')]);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function search(Request $request)
    {
        $data['result'] = $this->CountryRepository->search($request);
        return view('country::index')->with($data);
    }
}
