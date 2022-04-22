<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DatatableComponent extends Component
{
    protected $datatable;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($datatable)
    {
        $this->datatable = $datatable;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $data['datatable'] = $this->datatable;
        return view('components.datatable-component')->with($data);
    }
}
