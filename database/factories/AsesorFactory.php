<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Asesor>
 */
class AsesorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //'usuario' => fake()->name(),
            //'usuario' => $this->faker->userName,
            'nombre' => fake()->name(),
            'correo' => fake()->email(),
            'user_id' => User::factory(), // Para cada asesor crearme un usuario y asegnar el id de usuario a este asesor
            'telefono' => $this->faker->numerify('33########'),

            //'escuela' => fake()-> sentence(),
        ];
    }
}
