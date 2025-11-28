<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        foreach (range(1, 10) as $index) {
            Mahasiswa::create([
                'nama' => fake()->name(),
                'nim' => '2025' .  $index,
                'fakultas' => fake()->randomElement(['Teknologi Informasi', 'Ekonomi', 'Hukum', 'Kedokteran', 'Teknik']),
            ]);
        }
        
    }
}
