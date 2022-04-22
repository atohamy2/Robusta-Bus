<?php

namespace Modules\Vehicle\view\Components\VehicleBrand;


use Illuminate\View\Component;
use Modules\Vehicle\Models\VehicleBrand ;

class VehicleBrandComponent extends Component
{


    protected $selectedVehicleBrand;
    protected $name;
    protected $id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($selectedVehicleBrand = null , $name = 'vehicle_brand_id',$id=null)
    {
        
        $this->selectedVehicleBrand=$selectedVehicleBrand;
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
        $data['result']=VehicleBrand::all();
        $data['selectedVehicleBrand']=$this->selectedVehicleBrand;
        $data['name']=$this->name;
        $data['id']=$this->id;

        return view('vehicle::components.vehiclebrand.vehicle-brand-component')->with($data);
    }
}
