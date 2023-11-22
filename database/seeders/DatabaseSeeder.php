<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Asesor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->withPersonalTeam()->create([
             'name' => 'Alejandro Hernández',
             'rol' => 1,
             'email' => 'alexhdezlego@live.com',
             'password' =>Hash::make('Alex.hd14'),
             'profile_photo_path' => 'profile-photos/ie6l4HyWTu4LPAzr8whOUEjaEgJnYjfYZSTw20N6.jpg',
         ]);

         \App\Models\Asesor::factory()->create([
            //'usuario' => 'AlexHD220',
            'nombre' => 'Prueba',
            'correo' => 'prueba@live.com',
            'user_id' => 1,
        ]);

        //lista de seeders que quiero que se ejecuten
        $this->call([
            AsesorSeeder::class,
            //OrganizacionSeeder::class,
        ]); // --> php artisan db:seed


        //Asesor::factory()->count(5)->create(); //--> generar informacion falsa

    }
}
