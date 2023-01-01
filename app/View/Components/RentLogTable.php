<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RentLogTable extends Component
{
    public $rentLog;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($rentLog)
    {
        $this->rentLog = $rentLog;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.rent-log-table');
    }
}
