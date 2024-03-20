<?php

namespace App\View\Components;

use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;
USE Illuminate\Support\Str;

class AllCoursesTable extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public Collection $courses){}


    public function excerpt($string, $limit){
        return Str::limit($string, $limit, '...');
    }

    public function isPastDate($date)
    {
        return Carbon::parse($date)->isPast();
    }

    public function isUserEnrolledInCourse($courseId)
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;

            $isEnrolled = DB::table('course_bookings')
                ->where('user_id', $userId)
                ->where('course_id', $courseId)
                ->exists();
    
            return $isEnrolled;
        }
    }
    public function isUserWaitingForConfirmation($courseId)
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;

            $isEnrolled = DB::table('course_bookings')
                ->where('user_id', $userId)
                ->where('course_id', $courseId)
                ->where('status', 'pending')
                ->exists();
    
            return $isEnrolled;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.all-courses-table');
    }
}
