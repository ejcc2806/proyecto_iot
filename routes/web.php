<?php

use App\Http\Controllers\DashboardController;

use App\Http\Controllers\{
    ContactController,
    StationController,
    SensorController
};
use App\Http\Controllers\DataApiController;


Route::get('/', [DashboardController::class, 'index'])->name('home'); // o 'dashboard'

Route::resource('stations', StationController::class)->only(['index','create','store']);
Route::resource('sensors',  SensorController::class)->only(['index','create','store']);
Route::get('/telemetry', [DataApiController::class,'series'])->name('api.telemetry'); 