<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CriterionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('criteria')->insert([
            [
                'name' => 'Requisitos Generales',
                'description' => 'Requisito mínimo para todos los solicitantes.',
                'minimum_gpa' => 8.0,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Programa de Honor',
                'description' => 'Nota mínimo para solicitantes del programa de honores.',
                'minimum_gpa' => 9.5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Beca atlética',
                'description' => 'Requisito de nota para becas deportivas.',
                'minimum_gpa' => 7.0,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
    }

