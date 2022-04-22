<?php

namespace Modules\Country\view\Components;

use Illuminate\View\Component;
use Modules\Country\Enums\UTC_Offset;

class UtcoffsetComponent extends Component
{

    protected $selectedUTC;
    protected $name;
    protected $id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($selectedUTC= null,$name='utc_offset',$id=null)
    {
      
        $this->selectedUTC=$selectedUTC;
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
        $data['result']=UTC_Offset::utc_offset;
        $data['selectedUTC']=$this->selectedUTC;
        $data['name']=$this->name;
        $data['id']=$this->id;
        return view('country::components.utcoffset-component')->with($data);
    
    }
}
