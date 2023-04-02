<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Deposito;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sensor>
 */
class SensorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre'=>$this->faker->randomNumber(),
            'deposito_id'=>Deposito::all()->random()->id,
        ];
    }
}
