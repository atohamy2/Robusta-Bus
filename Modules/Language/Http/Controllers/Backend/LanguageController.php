<?php

namespace Modules\Language\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\Language\Http\Requests\LanguageRequest;
use Modules\Language\Repositories\LanguageRepository;

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
    public function index()
    {
        $data['result'] = $this->languageRepository->allWithPaginate();
        return view('language::index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $data['model'] = $this->languageRepository->newInstance();
        return view('language::create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(LanguageRequest $request)
    {
        $this->languageRepository->store($request);
        return redirect()->route('language.index')->with(['status' => 'success', 'message' => __('Created Successfully')]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $data['model'] = $this->languageRepository->show($id);
        return view('language::show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $data['model'] = $this->languageRepository->show($id);
        return view('language::edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(LanguageRequest $request, $id)
    {
        $this->languageRepository->update($request, $id);
        return redirect()->route('language.index')->with(['status' => 'success', 'message' => __('Updated Successfully')]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->languageRepository->delete($id);
        return redirect()->route('language.index')->with(['status' => 'success', 'message' => __('Deleted Successfully')]);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function search(Request $request)
    {
        $data['result'] = $this->languageRepository->search($request);
        return view('language::index')->with($data);
    }
}
