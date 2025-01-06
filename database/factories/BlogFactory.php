<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'image' => fake()->imageUrl(),
            'privacy' => fake()->randomElement(['public', 'private']),  // Example privacy options
            'meta_tags' => fake()->words(5, true),  // Generate 5 comma-separated words for meta_tags
            'meta_description' => fake()->sentence(),
            'slug' => fake()->slug(),
            'published_at' => fake()->dateTimeThisYear(),  // You can adjust the logic to fit your needs
            'category_id' => fake()->numberBetween(1, 10),  // Random category_id between 1 and 10
            'image_alt' => fake()->sentence(),  // Alt text for image
            'featured_article' => fake()->boolean(),  // Random boolean value for featured_article
            'tags' => fake()->words(3, true),  // Comma-separated tags, 3 random words
        ];
    }
}
