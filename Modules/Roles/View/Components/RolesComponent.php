<?php

namespace Modules\Roles\View\Components;

use Illuminate\View\Component;
use Spatie\Permission\Models\Role;

class RolesComponent extends Component
{
    protected $selectedRole;
    protected $required;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($selectedRole = null, $required = true)
    {
        $this->selectedRole = $selectedRole;
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $data['roles'] = Role::all();
        $data['selectedRole'] = $this->selectedRole;
        $data['required'] = $this->required;
        return view('roles::components.rolescomponent')->with($data);
    }
}
