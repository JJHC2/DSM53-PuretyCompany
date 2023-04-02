<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Usuario;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TipoUsuario>
 */
class TipoUsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre_t'=>$this->faker->randomElement(['Administrador','Usuarios','Cliente']),
            'usuario_id'=>Usuario::all()->random()->id,
        ];
    }
}
