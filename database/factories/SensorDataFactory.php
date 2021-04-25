<?php

namespace Database\Factories;

use App\Models\sensor_data;
use Illuminate\Database\Eloquent\Factories\Factory;

class SensorDataFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = sensor_data::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'dht22_temperature' => $this->faker->randomFloat(),
            'dht22_humidity' => $this->faker->randomFloat(),
            'bmp388_temperature' => $this->faker->randomFloat(),
            'bmp388_pressure' => $this->faker->randomFloat(),
            'bmp388_altitude' => $this->faker->randomFloat(),
        ];
    }
}
