<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(50)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Admin1234!'),
            'remember_token' => Str::random(10),
            'role' => 'admin',
            'profile_image' => "https://picsum.photos/id/". rand(1, 999) ."/200/200",
            'phone_number' => fake()->phoneNumber(),
            'bio' => fake()->text()
        ]);

        User::factory()->create([
            'name' => 'Mario Rossi',
            'email' => 'm.rossi@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Pa$$w0rd!'),
            'remember_token' => Str::random(10),
            'role' => 'user',
            'profile_image' => "https://picsum.photos/id/". rand(1, 999) ."/200/200",
            'phone_number' => fake()->phoneNumber(),
            'bio' => fake()->text()
        ]);
    }

    
}
