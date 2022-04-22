<?php

namespace Modules\Country\view\Components;


use Illuminate\View\Component;
use Modules\Country\Models\Country ;

class CountriesComponent extends Component
{


    protected $selectedCountry;
    protected $name;
    protected $id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($selectedCountry = null , $name = 'country_id',$id=null)
    {
        
        $this->selectedCountry=$selectedCountry;
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
        $data['result']=Country::all();
        $data['selectedCountry']=$this->selectedCountry;
        $data['name']=$this->name;
        $data['id']=$this->id;

        return view('country::components.countries-component')->with($data);
    }
}
