<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Faculty>
 */
class FacultyFactory extends Factory
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
            'designation' => $this->faker->word(),
            'qualification' => $this->faker->words(3, true),
            'experience' => $this->faker->numberBetween(1, 40),
            'specialization' => $this->faker->words(3, true),
            'joining_date' => $this->faker->date(),
            'leaving_date' => $this->faker->optional()->date(),
            'status' => $this->faker->boolean(),
            'is_cordinator' => $this->faker->boolean(),
        ];
    }
}
