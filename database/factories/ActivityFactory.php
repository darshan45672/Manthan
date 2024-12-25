<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activity>
 */
class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'start_date' => $this->faker->dateTime,
            'end_date' => $this->faker->dateTime,
            'start_time' => $this->faker->time,
            'end_time' => $this->faker->time,
            'duration' => $this->faker->randomDigit,
            'fees' => $this->faker->randomFloat(2, 0, 100),
            'location' => $this->faker->word,
            'is_featured' => $this->faker->boolean,
            'address' => $this->faker->address,
            'requires_registration' => $this->faker->boolean,
            'venue' => $this->faker->word,
        ];
    }
}
