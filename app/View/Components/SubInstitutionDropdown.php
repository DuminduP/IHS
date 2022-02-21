<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\SubInstitution;

class SubInstitutionDropdown extends Component
{
    public $selectedId;
    public $institutionId;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($selectedId = 0, $institutionId=0)
    {
        $this->selectedId = $selectedId;
        $this->institutionId = $institutionId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.institution-dropdown', [
            'types' => SubInstitution::where('institution_id', $this->institutionId)->get(),
        ]);
    }
}
