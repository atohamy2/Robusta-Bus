<?php

namespace Modules\Driver\Repositories;

use App\Enums\Pagination;
use Modules\Driver\Models\Driver;

class DriverRepository
{
    public function allWithPaginate()
    {
        return Driver::paginate(Pagination::PER_PAGE);
    }

    public function all()
    {
        return Driver::all();
    }

    public function store($request)
    {

        return Driver::create($request->all());
    }

    public function update($request, $id)
    {
        $driver = Driver::findOrFail($id);
        $driver->fill($request->all());
        $driver->save();
        return $driver;
    }

    public function delete($id)
    {
        return Driver::find($id)->delete();
    }

    public function foreceDelete($id)
    {
        return Driver::find($id)->foreceDelete();
    }

    public function restore($id)
    {
        return Driver::find($id)->restore();
    }

    public function show($id)
    {
        return Driver::findOrFail($id);
    }

    public function newInstance()
    {
        return new Driver;
    }

    public function search($request)
    {
        return Driver::when($request->filled('name'), function($query) use($request){
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
