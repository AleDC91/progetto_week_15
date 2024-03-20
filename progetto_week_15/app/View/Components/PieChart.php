<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class PieChart extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Collection $users, 
        public Collection $courses, 
        public int $confirmedUsers, 
        public int $cancelledUsers, 
        public int $pendingUsers, 

        ){}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.pie-chart');
    }
}
