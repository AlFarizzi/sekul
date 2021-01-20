<?php

namespace App\View\Components;

use Illuminate\View\Component;

class finance extends Component
{
    public $finances;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($finances)
    {
        $this->finances = $finances;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.finance');
    }
}
