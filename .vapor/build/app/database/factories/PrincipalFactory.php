<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Principal>
 */
class PrincipalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'college_id' => \App\Models\College::factory(),
            'qualification' => ['PhD'],
            'experience' => fake()->numberBetween(5, 30),
            'specialization' => ['Computer Science', 'Data Science'],
            'joining_date' => $this->faker->dateTime(),
        ];
    }
}
