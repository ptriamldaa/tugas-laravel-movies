<?php

namespace Database\Seeders;

use App\Models\CastMovie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CastMovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CastMovie::factory()->count(20)->create();
    }
}
