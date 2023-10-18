<?php

namespace Database\Seeders;

use App\Models\Participante;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParticipanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Participante::factory()->count(5)->create(); //--> generar informacion falsa
    }
}
