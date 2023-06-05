<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CalendarioElectoral>
 */
class CalendarioElectoralFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'concepto' => $this->faker->text(25),
            'fechaInicial' => $this->faker->dateTimeBetween('now', '+3 week')->format('Y-m-d'),
            'fechaFinal' => $this->faker->dateTimeBetween('+3 week', '+5 months')->format('Y-m-d'),
        ];
    }
}
