<?php

namespace Modules\Country\view\Components;

use App\Enums\Currency;
use Illuminate\View\Component;

class CurrencyCodeComponent extends Component
{


    protected $selectedCurrency;
    protected $name;
    protected $id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($selectedCurrency = null , $name = 'currency_code',$id=null)
    {
        
        $this->selectedCurrency=$selectedCurrency;
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
        $data['result']=Currency::Currency_Code;
        $data['selectedCurrency']=$this->selectedCurrency;
        $data['name']=$this->name;
        $data['id']=$this->id;

        return view('country::components.currency-code-component')->with($data);
    }
}
