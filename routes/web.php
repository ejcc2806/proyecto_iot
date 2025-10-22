<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StationController;
use App\Http\Controllers\SensorController;


Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('stations', StationController::class);

Route::resource('sensors', SensorController::class);
