<?php

namespace Modules\City\Repositories;

use App\Enums\Pagination;
use Modules\City\Models\City;



class CityRepository
{
    public function allWithPaginate()
    {
        return City::paginate(Pagination::PER_PAGE);
    }

    public function all()
    {
        return City::all();
    }

    public function store($request)
    {

        return City::create($request->all());
    }

    public function update($request, $id)
    {
        $city = City::findOrFail($id);
        $city->fill($request->all());
        $city->save();
        return $city;
    }

    public function delete($id)
    {

        return City::find($id)->delete();
    }

    public function show($id)
    {
        return City::findOrFail($id);
    }

    public function newInstance()
    {
        return new City;
    }

    public function search($request)
    {
        return City::when($request->filled('city_name'), function($query) use($request){
            $query->where('city_name', 'LIKE', "%{$request->city_name}%");
        })
        ->when($request->filled('country_id'), function($query) use($request){
            $query->where('country_id', $request->country_id);
        })
        ->paginate(Pagination::PER_PAGE);
    }
}
