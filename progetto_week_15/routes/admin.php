<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;


Route::get('admin', [AdminController::class, 'index'])->middleware('auth', 'admin')->name('admin.index');

Route::put('/user/{user}/course/{course}/admit', [AdminController::class, 'admit'])->middleware('auth', 'admin')->name('admit');
Route::put('/user/{user}/course/{course}/reject', [AdminController::class, 'reject'])->middleware('auth', 'admin')->name('reject');
Route::put('/user/{user}/course/{course}/reconsider', [AdminController::class, 'reconsider'])->middleware('auth', 'admin')->name('reconsider');
Route::put('/user/{user}/course/{course}/revoke', [AdminController::class, 'revoke'])->middleware('auth', 'admin')->name('revoke');

Route::get('statistics', [AdminController::class, 'statistics'])->middleware('auth', 'admin')->name('statistics');
