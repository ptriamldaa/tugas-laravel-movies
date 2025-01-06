<?php

namespace Database\Factories;

use App\Models\Cast;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

/*
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CastMovieFactory extends Factory
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
            'movie_id' => Movie::inRandomOrder()->first()->id,
            'cast_id' => Cast::inRandomOrder()->first()->id,
        ];
    }
}
