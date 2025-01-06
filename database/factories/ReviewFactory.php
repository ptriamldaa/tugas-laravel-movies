<?php

namespace Database\Factories;

use App\Models\Movie;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/*
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid(),
            'review' => $this->faker->paragraph(),
            'rating' => $this->faker->randomFloat(1, 1, 5),
            'user_id' => User::inRandomOrder()->first()->id,
            'movie_id' => Movie::inRandomOrder()->first()->id,
        ];
    }
}
