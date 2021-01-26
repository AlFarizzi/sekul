<?php

namespace App\View\Components\Laporan;

use Illuminate\View\Component;

class Spp extends Component
{
    public $total,$totalAmount;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($total,$totalAmount)
    {
        $this->total = $total;
        $this->totalAmount = $totalAmount;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.laporan.spp');
    }
}
