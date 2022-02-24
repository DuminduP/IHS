<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\City;

class CitiesDropdown extends Component
{
    public $selectedId;

    public $districtId;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($selectedId = 0, $districtId = 0)
    {
        $this->selectedId = $selectedId;
        $this->districtId = $districtId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cities-dropdown', [
            'types' => City::where('district_id', $this->districtId)->get(),
        ]);
    }
}
