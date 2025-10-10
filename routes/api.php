<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataApiController;



Route::get('/telemetry', [DataApiController::class, 'series']);
