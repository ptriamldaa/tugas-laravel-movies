<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            ['id' => Str::uuid(), 'name' => 'Admin', 'created_at' => now(), 'updated_at' => now(),],
            ['id' => Str::uuid(), 'name' => 'User' , 'created_at' => now(), 'updated_at' => now(),],
            ['id' => Str::uuid(), 'name' => 'Guest', 'created_at' => now(), 'updated_at' => now(),],
        ]);

        Role::factory()->count(5)->create();
    }
}
