<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/*
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CastFactory extends Factory
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
            'name' => $this->faker->name(),
            'age' => $this->faker->numberBetween(5, 90),
            'biodata' => $this->faker->paragraph(),
            'avatar' => $this->faker->imageUrl(),
        ];
    }
}
