<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class AcceptUsersTable extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public Collection $courses){}

    public function countConfirmedUsers($course)
    {
        // Accesso alla relazione pivot tra utenti e corsi e conteggio degli utenti con stato "confirmed"
        return $course->users()->wherePivot('status', 'confirmed')->count();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.accept-users-table');
    }
}
