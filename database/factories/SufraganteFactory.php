<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sufragante>
 */
class SufraganteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'numeroDocumento' => $this->faker->randomNumber(3, true),
            'nombres' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'genero'=> $this->faker->randomElement(['Masculino', 'Femenino']),
            'estado' => 'activo'
        ];
    }
}
