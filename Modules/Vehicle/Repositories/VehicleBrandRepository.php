<?php 

namespace Modules\Vehicle\Repositories;

use App\Enums\Pagination;
use Modules\Vehicle\Models\VehicleBrand;

class VehicleBrandRepository {

    public function allWithPaginate()
    {
        return VehicleBrand::paginate(Pagination::PER_PAGE);
    }

    public function all()
    {
        return VehicleBrand::all();
    }
  
    

    public function store($request)
    {
        return VehicleBrand::create($request->all());
    }

    public function update($request, $id)
    {
        $vehiclbrand = VehicleBrand::findOrFail($id);
        $vehiclbrand->fill($request->all());
        $vehiclbrand->save();
        return $vehiclbrand;
    }

    public function delete($id)
    {
        return VehicleBrand::find($id)->delete();
    }

    public function show($id)
    {
        return VehicleBrand::findOrFail($id)->load('models');
    }

    public function newInstance()
    {
        return new VehicleBrand;
    }

    public function search($request)
    {
        return VehicleBrand::when($request->filled('vehical_brand_name'), function($query) use($request){
            $query->where('vehical_brand_name', 'LIKE', "%{$request->vehical_brand_name}%");
        })
        ->when($request->filled('vehical_brand_type'), function($query) use($request){
            $query->where('vehical_brand_type', $request->vehical_brand_type);
        })
        ->paginate(Pagination::PER_PAGE);
    }

}