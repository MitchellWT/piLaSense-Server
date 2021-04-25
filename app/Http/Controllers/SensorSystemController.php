<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sensor_system;

class SensorSystemController extends Controller
{
    /*
     * Show all sensor systems
     */
    public function index()
    {
        $sensor_systems = sensor_system::all();

        return view('sensor_systems.index', compact('sensor_systems'));
    }

    /*
     * Show a specific sensor system
     */
    public function show(sensor_system $sensor_system)
    {
        return view('sensor_systems.show', compact('sensor_system'));
    }

    /*
     * Provides a route for creating
     * a new sensor system
     */
    public function create(Request $request)
    {
        return view('sensor_systems.create');
    }

    /*
     * Stores a newly created sensor system
     */
    public function store(Request $request)
    {
        $validatedRequest = $this->validateSensorSystem($request);
        $validatedRequest['status'] = 'green';

        sensor_system::create($validatedRequest);

        return redirect()->route('sensor_systems.index');
    }

    /*
     * Provides a route for editing
     * a pre-existing sensor system
     */
    public function edit(sensor_system $sensor_system)
    {
        return view('sensor_systems.edit', compact('sensor_system'));
    }

    /*
     * Pushes edited
     */
    public function update(Request $request, sensor_system $sensor_system)
    {
        $validatedRequest = $this->validateSensorSystem($request);
        $sensor_system->update($validatedRequest);

        return redirect()->route('sensor_systems.index');
    }

    /*
     * Show a specific sensor system
     */
    public function destroy(sensor_system $sensor_system)
    {
        sensor_system::destroy($sensor_system->id);

        return redirect()->route('sensor_systems.index');
    }

    public function validateSensorSystem(Request $request)
    {
        return $request->validate([
            'name' => 'required|string|max:255',
            'ip_address' => 'required|string|max:255',
            'green_lower' => 'required|numeric',
            'green_upper' => 'required|numeric',
            'yellow_lower' => 'required|numeric',
            'yellow_upper' => 'required|numeric',
            'red_lower' => 'required|numeric',
            'red_upper' => 'required|numeric'
        ]);
    }
}
