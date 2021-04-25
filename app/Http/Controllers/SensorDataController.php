<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sensor_data;

class SensorDataController extends Controller
{
    /*
     * Stores a newly created sensor system
     */
    public function store(Request $request)
    {
        $validatedRequest = $this->validateSensorData($request);
        $sensor_data = sensor_data::create($validatedRequest);
        $temp_average = (($validatedRequest['bmp388_temperature'] + $validatedRequest['dht22_temperature']) / 2);
        $sensor_system = $sensor_data->sensor_system;
        $led_value = 'none';

        if ($temp_average >= $sensor_system->green_lower &&
            $temp_average <= $sensor_system->green_upper) {
            $led_value = 'green';
            $sensor_system->status = 'green';
            $sensor_system->save();

        } else if ($temp_average >= $sensor_system->yellow_lower &&
        $temp_average <= $sensor_system->yellow_upper) {
            $led_value = 'yellow';
            $sensor_system->status = 'yellow';
            $sensor_system->save();

        } else if ($temp_average >= $sensor_system->red_lower &&
        $temp_average <= $sensor_system->red_upper) {
            $led_value = 'red';
            $sensor_system->status = 'red';
            $sensor_system->save();

        }

        return response()->json($led_value, 201);
    }

    public function validateSensorData(Request $request)
    {
        return $request->validate([
            'sensor_system_id' => 'required|numeric',
            'dht22_temperature' => 'required|numeric',
            'dht22_humidity' => 'required|numeric',
            'bmp388_temperature' => 'required|numeric',
            'bmp388_pressure' => 'required|numeric',
            'bmp388_altitude' => 'required|numeric'
        ]);
    }
}
