<?php

namespace App\View\Components\finance;

use Illuminate\View\Component;

class receipt extends Component
{
    public $receipt;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($receipt)
    {
        $this->receipt;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.finance.receipt');
    }
}
