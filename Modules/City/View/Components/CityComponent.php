<?php

namespace Modules\City\View\Components;

use Illuminate\View\Component;
use Modules\City\Models\City;

class CityComponent extends Component
{
    protected $selectedCity;
    protected $name;
    protected $id;
    protected $parentId;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($selectedCity=null,$name='city_name',$id=null,$parentId=null)
    {
        $this->selectedCity=$selectedCity;
        $this->name=$name;
        $this->id=$id;
        $this->parentId=$parentId;
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
        $data['parentId']=$this->parentId;
        $data['selectedCity']=$this->selectedCity;
        $data['result']=City::all();
        return view('city::components.city-component')->with($data);
        
    }
}
