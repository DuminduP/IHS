<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Institution;

class InstitutionDropdown extends Component
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
        return view('components.institution-dropdown', [
            'types' => Institution::all(),
        ]);
    }
}
