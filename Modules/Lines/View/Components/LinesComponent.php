<?php

namespace Modules\Lines\View\Components;

use Illuminate\View\Component;
use Modules\Lines\Models\Lines;

class LinesComponent extends Component
{
    protected $selectedLine;
    protected $name;
    protected $id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($selectedLine=null,$name='name',$id=null)
    {
        $this->selectedLine=$selectedLine;
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
        $data['selectedLine']=$this->selectedLine;
        $data['result']=Lines::all();
        return view('lines::components.linescomponent')->with($data);
    }
}
