<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/* Sensor system that contains LED actuators.
 */
class sensor_system extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'ip_address',
        'status',
        'green_lower',
        'green_upper',
        'yellow_lower',
        'yellow_upper',
        'red_lower',
        'red_upper'
    ];

    public function sensor_datas()
    {
        return $this->hasMany(sensor_data::class);
    }

    public function recent_sensor_datas($num)
    {
        return $this->sensor_datas()->latest()->take($num)->get();
    }
}
