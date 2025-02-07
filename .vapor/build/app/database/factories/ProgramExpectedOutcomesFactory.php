<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProgramExpectedOutcomes>
 */
class ProgramExpectedOutcomesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'label' => $this->faker->word,
            'name' => $this->faker->word,
            'description' => $this->faker->paragraph,
        ];
    }
}
