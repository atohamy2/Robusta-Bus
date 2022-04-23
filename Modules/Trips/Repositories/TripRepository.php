<?php

namespace Modules\Trips\Repositories;

use App\Enums\Pagination;
use Modules\Trips\Models\Trip;


class TripRepository
{
    public function allWithPaginate()
    {
        return Trip::paginate(Pagination::PER_PAGE);
    }

    public function all()
    {
        return Trip::all();
    }

    public function store($request)
    {

        return Trip::create($request->all());
    }

    public function update($request, $id)
    {
        $city = Trip::findOrFail($id);
        $city->fill($request->all());
        $city->save();
        return $city;
    }

    public function delete($id)
    {

        return Trip::find($id)->delete();
    }

    public function show($id)
    {
        return Trip::findOrFail($id);
    }

    public function newInstance()
    {
        return new Trip;
    }

    public function search($request)
    {
        return Trip::when($request->filled('name'), function($query) use($request){
            $query->where('name', 'LIKE', "%{$request->name}%");
        })
        ->when($request->filled('bus_number'), function($query) use($request){
            $query->where('bus_number', $request->bus_number);
        })
        ->paginate(Pagination::PER_PAGE);
    }
}
