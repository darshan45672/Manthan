<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
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
        'usn' => $this->faker->unique()->regexify('[A-Z]{2}[0-9]{2}[A-Z]{2}[0-9]{3}'),
        'semester' => $this->faker->numberBetween(1, 8),
        ];
    }
}
