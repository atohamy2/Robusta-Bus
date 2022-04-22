<?php

namespace Modules\Rider\Repositories;

use App\Enums\Pagination;
use Modules\Rider\Models\Rider;

class RiderRepository
{
    public function allWithPaginate()
    {
        return Rider::paginate(Pagination::PER_PAGE);
    }

    public function all()
    {
        return Rider::all();
    }

    public function store($request)
    {
        return Rider::create($request->all());
    }

    public function update($request, $id)
    {
        $rider = Rider::findOrFail($id);
        $rider->fill($request->all());
        $rider->save();
        return $rider;
    }

    public function delete($id)
    {
        return Rider::find($id)->delete();
    }

    public function foreceDelete($id)
    {
        return Rider::find($id)->foreceDelete();
    }

    public function restore($id)
    {
        return Rider::find($id)->restore();
    }

    public function show($id)
    {
        return Rider::findOrFail($id);
    }

    public function newInstance()
    {
        return new Rider;
    }

    public function search($request)
    {
        return Rider::when($request->filled('name'), function($query) use($request){
            $query->where('first_name', 'LIKE', "%{$request->name}%")->orWhere('last_name', 'LIKE', "%{$request->name}%");
        })
        ->when($request->filled('country_id'), function($query) use($request){
            $query->where('country_id', $request->country_id);
        })
        ->when($request->filled('city_id'), function($query) use($request){
            $query->where('city_id', $request->city_id);
        })
        ->when($request->filled('phone_number'), function($query) use($request){
            $query->where('phone_number', $request->phone_number);
        })
        ->when($request->filled('email'), function($query) use($request){
            $query->where('email', $request->email);
        })
        ->when($request->filled('gender'), function($query) use($request){
            $query->where('gender', $request->gender);
        })
        ->paginate(Pagination::PER_PAGE);
    }
}
