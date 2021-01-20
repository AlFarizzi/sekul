<?php

namespace App\View\Components\students;

use Illuminate\View\Component;

class Students extends Component
{
    public $students;
    public $classes;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($students,$classes)
    {
        $this->students = $students;
        $this->classes = $classes;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.students');
    }
}
