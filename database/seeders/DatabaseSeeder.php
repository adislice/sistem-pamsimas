<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Pelanggan;
use App\Models\Petugas;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Testing\Fakes\Fake;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        for ($i = 0; $i < 50; $i++) {
            Pelanggan::create([
                'nama' => fake()->name,
                'no_pelanggan' => fake()->unique()->numerify('##########'),
                'no_telepon' => fake()->unique()->numerify('08##########'),
                'rt' => fake()->randomElement([1, 2]),
                'rw' => fake()->randomElement([1,2]),
                'is_aktif' => fake()->boolean,
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
            
            ]);
        }

        Petugas::create([
            'nama' => fake()->name,
            'username' => 'admin',
            'password' => Hash::make('admin')
        ]);
    }
}
