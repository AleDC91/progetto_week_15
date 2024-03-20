<?php

use App\Http\Controllers\InstructorController;
use Illuminate\Support\Facades\Route;

Route::get('/instructors', [InstructorController::class, 'index'])->name('instructors.index')->middleware('auth');
Route::get('/instructors/{instructor}', [InstructorController::class, 'show'])->name('instructors.show')->middleware('auth');
