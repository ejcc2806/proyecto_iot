<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sensor;
use App\Models\Department;

class SensorController extends Controller
{
    public function index()
    {
        $sensors = Sensor::with('department.country')
            ->orderBy('name')
            ->paginate(10);

        return view('sensors.index', compact('sensors'));
    }

    public function create()
    {
        $departments = Department::orderBy('name')->get();
        return view('sensors.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'code' => 'required|string|max:20|unique:sensors,code',
            'abbrev' => 'nullable|string|max:10',
            'id_department' => 'required|exists:departments,id'
        ]);

        Sensor::create([
            'name' => $request->name,
            'code' => $request->code,
            'abbrev' => $request->abbrev,
            'id_department' => $request->id_department
        ]);

        return redirect()->route('sensors.index')->with('ok', 'Sensor creado exitosamente.');
    }
}
