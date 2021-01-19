<?php

namespace App\View\Components;

use Illuminate\View\Component;

class teachers extends Component
{
    public $teachers;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($teachers)
    {
        $this->teachers = $teachers;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.teachers');
    }
}
