<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('genres')->insert([
            ['id' => Str::uuid(), 'name' => 'Action', 'created_at' => now(), 'updated_at' => now(),],
            ['id' => Str::uuid(), 'name' => 'Comedy', 'created_at' => now(), 'updated_at' => now(),],
            ['id' => Str::uuid(), 'name' => 'Drama', 'created_at' => now(), 'updated_at' => now(),],
            ['id' => Str::uuid(), 'name' => 'Horror', 'created_at' => now(), 'updated_at' => now(),],
            ['id' => Str::uuid(), 'name' => 'Sci-Fi', 'created_at' => now(), 'updated_at' => now(),],
            ['id' => Str::uuid(), 'name' => 'Fantasy', 'created_at' => now(), 'updated_at' => now(),],
            ['id' => Str::uuid(), 'name' => 'Dokumenter', 'created_at' => now(), 'updated_at' => now(),],
        ]);

        // Genre::factory()->count(10)->create();
    }
}
