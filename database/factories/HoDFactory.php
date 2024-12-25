<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HoD>
 */
class HoDFactory extends Factory
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
            'department_id' => \App\Models\Department::factory(),
            'qualification' => ['PhD'],
            'experience' => fake()->numberBetween(5, 30),
            'specialization' => ['Computer Science', 'Data Science'],
            'joining_date' => fake()->date(),
            'leaving_date' => fake()->optional(0.2)->date(),
        ];
    }
}
