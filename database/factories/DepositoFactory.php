<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Usuario;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Deposito>
 */
class DepositoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'codigo'=>$this->faker->randomNumber(),
            'capacidad'=>$this->faker->randomNumber(),
            'Lugar'=>$this->faker->text(15),
            'usuario_id'=>Usuario::all()->random()->id,
        ];
    }
}
