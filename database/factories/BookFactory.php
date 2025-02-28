<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
        public function definition(): array
        {
            return [
                'title' => $this->faker->sentence(3),
                'author' => $this->faker->name(),
                'description' => $this->faker->paragraph(3),
                'cover' => $this->faker->imageUrl(200, 300, 'books', true, 'Faker'),
                'rating' => $this->faker->numberBetween(1, 5),
                'user_id' => User::factory(), 
            ];
        }
}
