<?php

namespace Modules\Language\View\Components;

use Illuminate\View\Component;
use Modules\Language\Models\Language;

class LanguagesComponent extends Component
{
    protected $selectedLanguage;
    protected $name;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($selectedLanguage = null, $name = 'language_id')
    {
        $this->selectedLanguage = $selectedLanguage;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $data['result'] = Language::all();
        $data['selectedLanguage'] = $this->selectedLanguage;
        $data['name'] = $this->name;
        return view('language::components.languagescomponent')->with($data);
    }
}
