<?php

namespace App\View\Components;

use App\Models\User;
use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class MyStats extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public User $user)
    {
    }


    public function isPastDate($date)
    {
        return Carbon::parse($date)->isPast();
    }

    public function completedCourses($courses)
    {
        $completedCourses = [];

        foreach ($courses as $course) {
            $end_date = Carbon::parse($course->end_date);
            if ($this->isPastDate($end_date)) {
                $completedCourses[] = $course;
            }
        }

        return $completedCourses;
    }

    public function statusSubscriptions($courses, $statusName)
    {
        $statusCourses = [];

        foreach ($courses as $course) {
            $status = DB::table('course_bookings')
                ->where('user_id', Auth::user()->id)
                ->where('course_id', $course->id)
                ->value('status');
            $end_date = Carbon::parse($course->end_date);
            if ($end_date->isFuture() && $status === $statusName) {
                $statusCourses[] = $course;
            }
        }

        return $statusCourses;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.my-stats');
    }
}
