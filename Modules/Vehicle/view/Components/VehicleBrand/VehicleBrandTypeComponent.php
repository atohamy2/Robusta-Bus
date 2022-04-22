<?php

namespace Modules\Vehicle\view\Components\VehicleBrand;


use Illuminate\View\Component;
use Modules\Vehicle\Enums\VehicleBrandType;

class VehicleBrandTypeComponent extends Component
{


    protected $selectedVehicleBrandType;
    protected $name;
    protected $id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($selectedVehicleBrandType = null , $name = 'vehicle_brand_type',$id=null)
    {
        
        $this->selectedVehicleBrandType=$selectedVehicleBrandType;
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
        $data['result']=VehicleBrandType::getValues();
        $data['selectedVehicleBrandType']=$this->selectedVehicleBrandType;
        $data['name']=$this->name;
        $data['id']=$this->id;

        return view('vehicle::components.vehiclebrand.vehicle-brand-type-component')->with($data);
    }
}
