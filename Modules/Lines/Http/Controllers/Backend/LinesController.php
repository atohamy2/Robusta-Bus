<?php

namespace Modules\Lines\Http\Controllers\Backend;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\City\Repositories\CityRepository;
use Modules\Lines\Http\Requests\LinesRequest;
use Modules\Lines\Models\LinePoints;
use Modules\Lines\Repositories\LinesRepository;
use Modules\Language\Repositories\LanguageRepository;

class LinesController extends Controller
{
    protected $LinesRepository;
    protected $LanguageRepository;

    public function __construct(LinesRepository $LinesRepository,LanguageRepository $LanguageRepository,CityRepository $cityRepository)
    {
        $this->LinesRepository = $LinesRepository;
        $this->cityRepository = $cityRepository;
        $this->LanguageRepository = $LanguageRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $data['result'] = $this->LinesRepository->allWithPaginate();
        return view('lines::index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $data['model'] = $this->LinesRepository->newInstance();
        $data['cities']=$this->cityRepository->all();
        $data['languages']=$this->LanguageRepository->all();
        return view('lines::create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(LinesRequest $request)
    {
       $line =  $this->LinesRepository->store($request);
      $orders =  array_values(array_filter($request->order));
        foreach ($request->stop as $key=>$value)
        {
            $linepoints = new LinePoints();
            $linepoints->line_id = $line->id;
            $linepoints->city_id = $value;
            $linepoints->order  = $orders[$key];
            $linepoints->save();
        }
        return redirect()->route('lines.index')->with(['status' => 'success', 'message' => __('Created Successfully')]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $data['model'] = $this->LinesRepository->show($id);
        return view('lines::show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $data['model'] = $this->LinesRepository->show($id);
        $data['languages']=$this->LanguageRepository->all();
        return view('lines::edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $this->LinesRepository->update($request, $id);
        return redirect()->route('lines.index')->with(['status' => 'success', 'message' => __('Updated Successfully')]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->LinesRepository->delete($id);
        return redirect()->route('lines.index')->with(['status' => 'success', 'message' => __('Deleted Successfully')]);
    }
}
