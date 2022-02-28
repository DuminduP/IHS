<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\UserRoles;

class UserRolesDropdown extends Component
{
    public $selectedId;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($selectedId = 0)
    {
        $this->selectedId = $selectedId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.user-roles-dropdown', [
            'types' => UserRoles::all(),
        ]);
    }
}
