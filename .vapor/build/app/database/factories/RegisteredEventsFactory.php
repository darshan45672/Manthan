<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RegisteredEvents>
 */
class RegisteredEventsFactory extends Factory
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
            'program_id' => \App\Models\Program::factory(),
            'registration_date' => $this->faker->dateTime(),
            'is_paid' => $this->faker->boolean(),
            'is_attended' => $this->faker->boolean(),
        ];
    }
}
