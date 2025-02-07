<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gallery>
 */
class GalleryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'image' => $this->faker->imageUrl(),
            'description' => $this->faker->sentence(),
            'meta_description' => $this->faker->paragraph(),
            'meta_keywords' => $this->faker->words(3, true),
            'meta_title' => $this->faker->sentence(),
            'gallery_images' => $this->faker->imageUrl(),
            'is_published' => $this->faker->boolean(),
        ];
    }
}
