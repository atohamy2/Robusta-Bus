<?php 

namespace Modules\Vehicle\Repositories;

use App\Enums\Pagination;
use Modules\Vehicle\Enums\Vehicle;
use Modules\Vehicle\Models\VehicleModel;


class VehicleModelRepository {

    public function allWithPaginate()
    {
        return VehicleModel::paginate(Pagination::PER_PAGE);
    }

    public function all()
    {
        return VehicleModel::all();
    }
    

    public function store($request)
    {
        return VehicleModel::create($request->all());
    }
  
   
    
    public function update($request, $id)
    {
        $vehiclmodel = VehicleModel::findOrFail($id);
        $vehiclmodel->fill($request->all());
        $vehiclmodel->save();
        return $vehiclmodel;
    }

    public function delete($id)
    {
        return VehicleModel::find($id)->delete();
    }

    public function show($id)
    {
        return VehicleModel::findOrFail($id);
    }

    public function newInstance()
    {
        return new VehicleModel;
    }

    public function search($request)
    {
        return VehicleModel::when($request->filled('vehical_model_name'), function($query) use($request){
            $query->where('vehical_model_name', 'LIKE', "%{$request->vehical_model_name}%");
        })
        ->when($request->filled('vehical_model_type'), function($query) use($request){
            $query->where('vehical_model_type', $request->vehical_model_type);
        }) 
        ->when($request->filled('vehical_brand_id'), function($query) use($request){
            $query->where('vehical_brand_id', $request->vehical_brand_id);
        }) 
        ->when($request->filled('min_acceptance_year'), function($query) use($request){
            $query->where('min_acceptance_year', $request->min_acceptance_year);
        })
        ->paginate(Pagination::PER_PAGE);
    }

}