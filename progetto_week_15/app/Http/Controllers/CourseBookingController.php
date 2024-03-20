<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseBookingRequest;
use App\Http\Requests\UpdateCourseBookingRequest;
use App\Models\Course;
use App\Models\CourseBooking;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;

class CourseBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreCourseBookingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CourseBooking $courseBooking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseBooking $courseBooking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseBookingRequest $request, CourseBooking $courseBooking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function unsubscribe(User $user, Course $course)
    {
     //
    }
}
