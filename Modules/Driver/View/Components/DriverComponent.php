<?php

namespace Modules\Driver\View\Components;

use Illuminate\View\Component;
use Modules\Driver\Models\Driver;

class DriverComponent extends Component
{
    protected $selectedDriver;
    protected $name;
    protected $id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($selectedDriver=null,$name='driver_id',$id=null)
    {
        $this->selectedDriver=$selectedDriver;
        $this->name=$name;
        $this->id=$id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $data['name']=$this->name;
        $data['id']=$this->id;
        $data['selectedDriver']=$this->selectedDriver;
        $data['result']=Driver::all();
        return view('driver::components.driver-component')->with($data);
        
    }
}
