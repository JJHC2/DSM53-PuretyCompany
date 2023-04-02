<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Estados;
use App\Models\Municipios;
use App\Models\Usuario;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ubicacion>
 */
class UbicacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'ciudad'=>$this->faker->city(),
            'calle'=>$this->faker->text(10),
            'n_ex'=>$this->faker->randomnumber(5),
            'n_int'=>$this->faker->randomnumber(5),
            'colonia'=>$this->faker->text(15),
            'estado_id'=>Estados::all()->random()->id,
            'municipio_id'=>Municipios::all()->random()->id,
            'usuario_id'=>Usuario::all()->random()->id,

        ];
    }
}
