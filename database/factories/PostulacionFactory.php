<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Postulacion>
 */
class PostulacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fechaPostulacion' => $this->faker->dateTimeBetween('now', '+3 week')->format('Y-m-d'),
            'resultadoElectoral' => $this->faker->text(15),
            'facultad' => $this->faker->text(25),
        ];
    }
}
