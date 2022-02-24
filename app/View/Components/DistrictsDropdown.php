<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\District;

class DistrictsDropdown extends Component
{
    public $selectedId;
    public $provinceId;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($selectedId = 0, $provinceId=0)
    {
        $this->selectedId = $selectedId;
        $this->provinceId = $provinceId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.districts-dropdown', [
            'types' => District::where('province_id', $this->provinceId)->get(),
        ]);
    }
}
