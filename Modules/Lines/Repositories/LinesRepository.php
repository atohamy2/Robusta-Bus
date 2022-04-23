<?php

namespace Modules\Lines\Repositories;

use App\Enums\Pagination;
use Modules\Lines\Models\Lines;



class LinesRepository
{
    public function allWithPaginate()
    {
        return Lines::paginate(Pagination::PER_PAGE);
    }

    public function all()
    {
        return Lines::all();
    }

    public function store($request)
    {

        return Lines::create($request->all());
    }

    public function update($request, $id)
    {
        $city = Lines::findOrFail($id);
        $city->fill($request->all());
        $city->save();
        return $city;
    }

    public function delete($id)
    {

        return Lines::find($id)->delete();
    }

    public function show($id)
    {
        return Lines::findOrFail($id);
    }

    public function newInstance()
    {
        return new Lines;
    }

    public function search($request)
    {
//        return Lines::when($request->filled('city_name'), function($query) use($request){
//            $query->where('city_name', 'LIKE', "%{$request->city_name}%");
//        })
//        ->when($request->filled('country_id'), function($query) use($request){
//            $query->where('country_id', $request->country_id);
//        })
//        ->paginate(Pagination::PER_PAGE);
    }
}
