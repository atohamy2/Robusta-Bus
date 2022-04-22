<?php

namespace Modules\Vehicle\view\Components\VehicleModel;


use Illuminate\View\Component;
use Modules\Vehicle\Enums\Vehicle;
use Modules\Vehicle\Enums\VehicleModelType;

class VehicleModelTypeComponent extends Component
{


    protected $selectedVehicleModelType;
    protected $name;
    protected $id;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($selectedVehicleModelType = null , $name = 'vehicle_brand_id',$id=null)
    {
        
        $this->selectedVehicleModelType=$selectedVehicleModelType;
        $this->name=$name;
        $this->id=$id;

 
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $data['result']=VehicleModelType::getValues();
        $data['selectedVehicleModelType']=$this->selectedVehicleModelType;
        $data['name']=$this->name;
        $data['id']=$this->id;

        return view('vehicle::components.vehiclemodel.vehicle-model-type-component')->with($data);
    }
}
