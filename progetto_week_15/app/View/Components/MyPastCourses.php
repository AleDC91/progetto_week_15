<?php

namespace App\View\Components;

use App\Models\User;
use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Str;

class MyPastCourses extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public User $user){}

    public function excerpt($string, $limit){
        return Str::limit($string, $limit, '...');
    }

    public function isPastDate($date)
    {
        return Carbon::parse($date)->isPast();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.my-past-courses');
    }
}
