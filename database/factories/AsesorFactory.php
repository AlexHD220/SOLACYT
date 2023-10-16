<?php

namespace Database\Factories;

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
            'usuario' => fake()->name(),
            'nombre' => fake()->name(),
            'correo' => fake()->email(),
            //'telefono' => fake()-> sentence(),
            //'escuela' => fake()-> sentence(),
        ];
    }
}
