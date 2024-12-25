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
            'student_id' => $this->faker->randomDigitNotNull,
            'activity_type_id' => \App\Models\ActivityType::factory(),
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'program_expected_outcomes_id' => \App\Models\ProgramExpectedOutcomes::factory(),
            'start_date' => $this->faker->dateTime,
            'end_date' => $this->faker->dateTime,
            'hours' => $this->faker->randomFloat(2, 0, 100),
            'file' => $this->faker->word,
            'certificate' => $this->faker->word,
            'status' => $this->faker->word,
        ];
    }
}
