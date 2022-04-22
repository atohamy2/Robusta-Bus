<?php

namespace Modules\Vehicle\view\Components\VehicleModel;


use Illuminate\View\Component;
use Modules\Vehicle\Models\VehicleModel;

class VehicleModelComponent extends Component
{


    protected $selectedVehicleModel;
    protected $name;
    protected $id;
    protected $parentId;

   
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($selectedVehicleModel = null , $name = 'vehicle_brand_id',$id=null,$parentId=null)
    {
        
        $this->selectedVehicleModel=$selectedVehicleModel;
        $this->name=$name;
        $this->id=$id;
        $this->parentId=$parentId;
       
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $data['result']=VehicleModel::all();
        $data['selectedVehicleModel']=$this->selectedVehicleModel;
        $data['name']=$this->name;
        $data['id']=$this->id;
        $data['parentId']=$this->parentId;
       

        return view('vehicle::components.vehiclemodel.vehicle-model-component')->with($data);
    }
}
