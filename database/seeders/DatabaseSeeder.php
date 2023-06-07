<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {   
        /*
        \App\Models\PeriodoAcademico::factory(1)->create([
            'nombrePeriodo' => '2023-A',
            'estado' => 'Activo'
        ]);
        \App\Models\PeriodoAcademico::factory(1)->create([
            'nombrePeriodo' => '2023-B',
            'estado' => 'Inactivo'
        ]);

        $periodos = \App\Models\PeriodoAcademico::get();

        foreach($periodos as $periodo){
            \App\Models\CalendarioElectoral::factory(rand(1,3))->create([
                'idPeriodoAcademico' => $periodo->id,
                'estado' => 'Activo'
            ]); //
        }*/

        // \App\Models\User::factory(10)->create();
         \App\Models\Sufragante::factory(5)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
