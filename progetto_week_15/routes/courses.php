<?php

use App\Http\Controllers\CourseBookingController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

Route::resource('courses', CourseController::class)->except(['create', 'store'])->middleware('auth');

Route::get('create', [CourseController::class, 'create'])->middleware('auth', 'admin')->name('courses.create');
Route::post('create', [CourseController::class, 'store'])->middleware('auth', 'admin')->name('courses.store');

Route::post('/user/{user}/course/{course}', [CourseController::class, 'subscribe'])->name('subscribe')->middleware('auth');
Route::delete('/user/{user}/course/{course}', [CourseController::class, 'unsubscribe'])->name('unsubscribe')->middleware('auth');


require('instructors.php');