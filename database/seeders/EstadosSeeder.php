<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Estados;

class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estados::truncate();
        Estados::insert([
            ['nombre_e' => 'Aguascalientes'],
            ['nombre_e' => 'Baja California'],
            ['nombre_e' => 'Baja California Sur'],
            ['nombre_e' => 'Campeche'],
            ['nombre_e' => 'Coahuila'],
            ['nombre_e' => 'Colima'],
            ['nombre_e' => 'Chiapas'],
            ['nombre_e' => 'Chihuahua'],
            ['nombre_e' => 'Ciudad de México'],
            ['nombre_e' => 'Durango'],
            ['nombre_e' => 'Guanajuato'],
            ['nombre_e' => 'Guerrero'],
            ['nombre_e' => 'Hidalgo'],
            ['nombre_e' => 'Jalisco'],
            ['nombre_e' => 'Estado de México'],
            ['nombre_e' => 'Michoacán'],
            ['nombre_e' => 'Morelos'],
            ['nombre_e' => 'Nayarit'],
            ['nombre_e' => 'Nuevo León'],
            ['nombre_e' => 'Oaxaca'],
            ['nombre_e' => 'Puebla'],
            ['nombre_e' => 'Querétaro'],
            ['nombre_e' => 'Quintana Roo'],
            ['nombre_e' => 'San Luis Potosí'],
            ['nombre_e' => 'Sinaloa'],
            ['nombre_e' => 'Sonora'],
            ['nombre_e' => 'Tabasco'],
            ['nombre_e' => 'Tamaulipas'],
            ['nombre_e' => 'Tlaxcala'],
            ['nombre_e' => 'Veracruz'],
            ['nombre_e' => 'Yucatán'],
            ['nombre_e' => 'Zacatecas'],
        ]);
    }
}
