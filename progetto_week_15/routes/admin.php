<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;


Route::get('admin', [AdminController::class, 'index'])->middleware('auth', 'admin')->name('admin.index');
