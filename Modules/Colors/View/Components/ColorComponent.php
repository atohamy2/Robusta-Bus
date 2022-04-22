<?php

namespace Modules\Colors\View\Components;

use Illuminate\View\Component;
use Modules\Colors\Models\Color;

class ColorComponent extends Component
{
    protected $name,$selectedColor;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name='color_name' ,$selectedColor=null)
    {
        $this->name=$name;
        $this->selectedColor=$selectedColor;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $data['name']=$this->name;
        $data['result']=Color::all();
        $data['selectedColor']=$this->selectedColor;
        return view('colors::components.color-component')->with($data);
    }
}
