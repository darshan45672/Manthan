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
            'user_id' => rand(1, 1000) ,
            'college_id' => rand(1, 50),
            'department_id' => rand(1, 50),
            'qualification' => ['PhD'],
            'experience' => fake()->numberBetween(5, 30),
            'specialization' => ['Computer Science', 'Data Science'],
            'joining_date' => fake()->date(),
            'leaving_date' => fake()->optional(0.2)->date(),
        ];
    }
}
