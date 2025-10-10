<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Station;
use App\Models\City;

class StationController extends Controller
{
    public function index()
    {
        $stations = Station::with('city.department.country')
            ->orderBy('name')
            ->paginate(10);

        return view('stations.index', compact('stations'));
    }

    public function create()
    {
        $cities = City::orderBy('name')->get();
        return view('stations.create', compact('cities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'code' => 'required|string|max:20|unique:stations,code',
            'id_city' => 'required|exists:cities,id'
        ]);

        Station::create([
            'name' => $request->name,
            'code' => $request->code,
            'id_city' => $request->id_city
        ]);

        return redirect()->route('stations.index')->with('ok', 'Estación creada exitosamente.');
    }
}
