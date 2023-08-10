<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Candidato;
use App\Models\CuerpoColegiado;
use App\Models\Facultad;
use App\Models\Postulacion;
use App\Models\ProgramaAcademico;
use App\Models\Sufragante;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {   
        
        \App\Models\PeriodoAcademico::factory(1)->create([
            'nombrePeriodo' => '2023-A',
            'estado' => 'Activo'
        ]);
        \App\Models\PeriodoAcademico::factory(1)->create([
            'nombrePeriodo' => '2023-B',
            'estado' => 'Inactivo'
        ]);

        $periodos = \App\Models\PeriodoAcademico::all();

        foreach($periodos as $periodo){
            \App\Models\CalendarioElectoral::factory(rand(1,3))->create([
                'idPeriodoAcademico' => $periodo->id,
                'estado' => 'Activo'
            ]); //
        }

        Facultad::factory(10)->create();

        $facultades = Facultad::all();

        foreach($facultades as $facultad){
            ProgramaAcademico::factory(rand(1,2))->create([
                'facultad_id' => $facultad->id
            ]); //
        }
        
        CuerpoColegiado::factory(10)->create();

        Candidato::factory(10)->create();

        $tags = Tag::factory(3)->create();

        Postulacion::factory(5)->create([
            'cuerpo_colegiado_id' => rand(1,10),
            'programa_academico_id' => rand(1,10),
            'calendario_electoral_id' => rand(1,3),
        ])
        ->each(function ($postulacion) use ($tags){
            $postulacion->tags()->attach($tags->random(rand(1,2)));
        });

        $postulaciones = Postulacion::all();
        foreach($postulaciones as $postulacion){
            $candidatos = Candidato::inRandomOrder()->take(rand(1,5))->pluck('id');
            $numPlancha = 1;
            
            foreach($candidatos as $candidato){
                $postulacion->candidatos()->attach($candidato, ['numero_plancha' => $numPlancha]);
                $numPlancha++;
            }
        }

        

        Sufragante::factory(5)
        ->create()
        ->each(function ($sufragante) use ($tags){
            $sufragante->tags()->attach($tags->random(rand(1,2)));
        } );
        //(function($sufragante) use ($tags) {$sufragante->tags()->attach()});



        // \App\Models\User::factory(10)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
