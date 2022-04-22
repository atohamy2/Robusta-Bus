<?php

namespace Modules\Vehicle\Repositories;

use App\Enums\Pagination;
use Modules\Vehicle\Models\Vehicle;

class VehicleRepository
{
    public function allWithPaginate()
    {
        return Vehicle::paginate(Pagination::PER_PAGE);
    }

    public function all()
    {
        return Vehicle::all();
    }

    public function getAllByDriverId($id)
    {
        return Vehicle::whereDriverId($id)->with(['vehicleBrand', 'vehicleModel', 'color'])->orderByDesc('id')->get();
    }

    public function store($request)
    {
        return Vehicle::create($request->all());
    }

    public function update($request, $id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->fill($request->all());
        $vehicle->save();
        return $vehicle;
    }

    public function delete($id)
    {
        return Vehicle::find($id)->delete();
    }

    public function foreceDelete($id)
    {
        return Vehicle::find($id)->foreceDelete();
    }

    public function restore($id)
    {
        return Vehicle::find($id)->restore();
    }

    public function show($id)
    {
        return Vehicle::findOrFail($id);
    }

    public function newInstance()
    {
        return new Vehicle;
    }

    public function search($request)
    {
        return Vehicle::when($request->filled('driver_id'), function($query) use($request){
            $query->where('driver_id', $request->driver_id);
        })
        ->when($request->filled('vehicle_brand_id'), function($query) use($request){
            $query->where('vehicle_brand_id', $request->vehicle_brand_id);
        })
        ->when($request->filled('vehicle_model_id'), function($query) use($request){
            $query->where('vehicle_model_id', $request->vehicle_model_id);
        })
        ->when($request->filled('vehicle_color_id'), function($query) use($request){
            $query->where('vehicle_color_id', $request->vehicle_color_id);
        })
        ->when($request->filled('year'), function($query) use($request){
            $query->where('year', $request->year);
        })
        ->when($request->filled('licence_number'), function($query) use($request){
            $query->where('licence_number', $request->licence_number);
        })
        ->when($request->filled('licence_expiration_date'), function($query) use($request){
            $query->where('licence_expiration_date', $request->licence_expiration_date);
        })
        ->when($request->filled('plate_number'), function($query) use($request){
            $query->where('plate_number', $request->plate_number);
        })
        ->paginate(Pagination::PER_PAGE);
    }

}
