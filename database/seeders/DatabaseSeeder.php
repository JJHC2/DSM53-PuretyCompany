<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call('key:generate');
        Schema::disableForeignKeyConstraints();
        $this->call([
            EstadosSeeder::class,
            MunicipiosSeeder::class
        ]);
        Schema::enableForeignKeyConstraints();
    }
    }

