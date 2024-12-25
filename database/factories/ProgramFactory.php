<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Program>
 */
class ProgramFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'banner' => $this->faker->imageUrl(),
            'name' => $this->faker->word(),
            'description' => $this->faker->paragraph(),
            'type' => $this->faker->randomElement(['SDP', 'FDP', 'STTP', 'Workshop', 'Seminar', 'Conference', 'Webinar', 'Hackathon', 'Bootcamp', 'Other']),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'start_time' => $this->faker->time(),
            'end_time' => $this->faker->time(),
            'duration' => $this->faker->numberBetween(1, 8) . ' hours',
            'fees' => $this->faker->randomFloat(2, 0, 1000),
            'location' => $this->faker->address(),
            'is_featured' => $this->faker->boolean(),
            'address' => $this->faker->address(),
            'requires_registration' => $this->faker->boolean(),
            'venue' => $this->faker->company(),
        ];
    }
}
