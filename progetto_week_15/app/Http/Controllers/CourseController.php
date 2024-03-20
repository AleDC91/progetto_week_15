<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Access\AuthorizationException;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();
        return view('courses.courses', ['courses' => $courses ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
       
    }

    public function unsubscribe(User $user, Course $course)
    {
        try {
            // $this->authorize('unsubscribe', [$user, $course]);
            $user->courses()->detach($course->id);

            return redirect('dashboard')->with('success', "Unsubscribed successfully from course $course->name !");
        } catch (\Exception $e) {
            if ($e instanceof AuthorizationException) {
                return redirect()->back()->with('error', "You are not allowed to delete this booking!");
            } else {
                return redirect()->back()->with('error', "An error occurred while deleting this booking");
            }
        }
    }

    public function subscribe(User $user, Course $course)
    {
        try {
            // $this->authorize('subscribe', [$user, $course]);
            $user->courses()->attach($course->id, ['created_at' => $course->created_at, 'updated_at' => Carbon::now()]);

            return redirect()->back()->with('success', "Subscribed successfully to course $course->name !");
        } catch (\Exception $e) {
            if ($e instanceof AuthorizationException) {
                return redirect()->back()->with('error', "You are not allowed to delete this booking!");
            } else {
                return redirect()->back()->with('error', "An error occurred while deleting this booking");
            }
        }
    }
}
