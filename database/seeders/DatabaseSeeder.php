<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'username' => 'admin',
            'email' => 'test@example.com',
        ]);

        \App\Models\Biography::create([
            'body' => fake()->paragraph(40),
        ]);

        \App\Models\Setting::create([
            'custom_css' => '/* Custom CSS */'
        ]);
    }
}
