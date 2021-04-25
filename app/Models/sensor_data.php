<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
