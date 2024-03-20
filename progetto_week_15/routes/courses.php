<?php

use App\Http\Controllers\CourseBookingController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

Route::resource('courses', CourseController::class)->middleware('auth');

Route::post('/user/{user}/course/{course}', [CourseController::class, 'subscribe'])->name('subscribe')->middleware('auth');
Route::delete('/user/{user}/course/{course}', [CourseController::class, 'unsubscribe'])->name('unsubscribe')->middleware('auth');

require('instructors.php');