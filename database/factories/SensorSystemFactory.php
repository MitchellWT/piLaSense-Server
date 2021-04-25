<?php

namespace Database\Factories;

use App\Models\sensor_system;
use Illuminate\Database\Eloquent\Factories\Factory;

class SensorSystemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = sensor_system::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'ip_address' => '192.168.1.10'
        ];
    }
}
