<?php

namespace App\Http\Controllers;

use App\Models\Station;
use App\Models\Sensor;
use App\Models\SensorData;

class DashboardController extends Controller
{
    public function index()
    {
        // Métricas básicas
        $stations = Station::with('city')->orderBy('name')->get();
        $sensorsOnline = Sensor::where('status', true)->count();
        $lastSync = SensorData::max('created_at');
        $dbDriver = strtoupper(config('database.default'));

        return view('dashboard', compact('stations', 'sensorsOnline', 'lastSync', 'dbDriver'));
    }
}
