<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/* Database entry for sensor data, this data
 * is from the DHT22 and BMP388 sensor.
 */
class sensor_data extends Model
{
    use HasFactory;

    protected $fillable = [
        'sensor_system_id',
        'dht22_temperature',
        'dht22_humidity',
        'bmp388_temperature',
        'bmp388_pressure',
        'bmp388_altitude'
    ];

    public function sensor_system()
    {
        return $this->belongsTo(sensor_system::class);
    }
}
