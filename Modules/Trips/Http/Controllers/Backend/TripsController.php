<?php

namespace Modules\Trips\Http\Controllers\Backend;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\City\Models\City;
use Modules\Lines\Models\LinePoints;
use Modules\Trips\Enums\Seats;
use Modules\Language\Repositories\LanguageRepository;
use Modules\Trips\Models\BookSeat;
use Modules\Trips\Models\Trip;
use Modules\Trips\Repositories\TripRepository;

class TripsController extends Controller
{
    protected $TripRepository;
    protected $LanguageRepository;

    public function __construct(TripRepository $TripRepository,LanguageRepository $LanguageRepository)
    {
        $this->TripRepository = $TripRepository;
        $this->LanguageRepository = $LanguageRepository;

    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $data['result'] = $this->TripRepository->allWithPaginate();
        return view('trips::index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $data['model'] = $this->TripRepository->newInstance();
        $data['languages']=$this->LanguageRepository->all();
        return view('trips::create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $this->TripRepository->store($request);
        return redirect()->route('trips.index')->with(['status' => 'success', 'message' => __('Created Successfully')]);

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $data['model'] = $this->TripRepository->show($id);
        return view('trips::show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $data['model'] = $this->TripRepository->show($id);
        $data['languages']=$this->LanguageRepository->all();

        return view('trips::edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $this->TripRepository->update($request, $id);
        return redirect()->route('trips.index')->with(['status' => 'success', 'message' => __('Updated Successfully')]);

    }


    public function book(Request $request,$id)
    {
        $data['trip'] = $this->TripRepository->show($id);
        $data['request']=$request;
        if(isset($request->to))
        {
            $data['seats'] = Seats::bus_seats;
            $fromOrder = LinePoints::where('city_id',$request->from)->where('line_id',$data['trip']->line_id)->first()->order;
            $toOrder = LinePoints::where('city_id',$request->to)->where('line_id',$data['trip']->line_id)->first()->order;
            $seatpoints = LinePoints::where('line_id',$data['trip']->line_id)->whereBetween('order',[$fromOrder,$toOrder])->pluck('order');
            $data['unavaliable'] = BookSeat::where('trip_id',$id)->where('to_order','>',$fromOrder)
                ->where('from_order','<',$toOrder)->pluck('seat')->toarray();
        }

        if(isset($request->bookedseats))
        {
            foreach ($request->bookedseats as $seat)
            {
                $bookseat = new BookSeat();
                $bookseat->trip_id = $id;
                $bookseat->from = $request->from;
                $bookseat->to = $request->to;
                $bookseat->from_order = $fromOrder;
                $bookseat->to_order = $toOrder;
                $bookseat->seat = $seat;
                $bookseat->seat_points = json_encode($seatpoints);
                $bookseat->save();
            }
            return redirect()->route('trips.book',['id'=>$id])->with(['status' => 'success', 'message' => __('Deleted Successfully')]);

        }

        $data['bookedseats'] = BookSeat::where('trip_id',$id)->get();

        return view('trips::book')->with($data);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->TripRepository->delete($id);
        return redirect()->route('trips.index')->with(['status' => 'success', 'message' => __('Deleted Successfully')]);

    }
}
