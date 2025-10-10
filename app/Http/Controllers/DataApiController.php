<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SensorData;

class DataApiController extends Controller
{
    public function series(Request $request)
    {
        $request->validate([
            'station_id' => 'required|integer|exists:stations,id',
            'from' => 'nullable|date',
            'to' => 'nullable|date',
            'group' => 'nullable|in:minute,hour,day'
        ]);

        $stationId = (int) $request->station_id;
        $from = $request->input('from', now()->subDay());
        $to = $request->input('to', now());
        $group = $request->input('group', 'hour');

        $fmt = match($group) {
            'minute' => '%Y-%m-%d %H:%i:00',
            'day' => '%Y-%m-%d 00:00:00',
            default => '%Y-%m-%d %H:00:00'
        };

        $rows = SensorData::selectRaw("STR_TO_DATE(DATE_FORMAT(created_at, '$fmt'), '%Y-%m-%d %H:%i:%s') b, AVG(temp_value) t, AVG(humidity) h")
            ->where('id_station', $stationId)
            ->whereBetween('created_at', [$from, $to])
            ->groupBy(DB::raw('b'))
            ->orderBy('b')
            ->get();

        return response()->json([
            'labels' => $rows->pluck('b')->map(fn($d) => \Carbon\Carbon::parse($d)->format('Y-m-d H:i')),
            'temp' => $rows->pluck('t')->map(fn($v) => (float)$v),
            'hum' => $rows->pluck('h')->map(fn($v) => (float)$v),
        ]);
    }
}
