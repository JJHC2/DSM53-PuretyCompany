<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Sensor;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Requerimiento>
 */
class RequerimientoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'PPM'=>$this->faker->randomNumber(),
            'sensor_id'=>Sensor::all()->random()->id,
        ];
    }
}
