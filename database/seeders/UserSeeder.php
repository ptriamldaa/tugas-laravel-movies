<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataRole = Role::first()->id;

        if (!$dataRole) {
            $this->command->error('Role Tidak Ada.');
            return;
        }

        User::create([
            'id' => Str::uuid(),
            'name' => 'Putri Aulia M',
            'email' => 'ptriam@gmail.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'role_id' => $dataRole,
        ]);
        
        User::factory()->count(15)->create();
    }
}
