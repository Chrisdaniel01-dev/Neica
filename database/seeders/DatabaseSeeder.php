<?php

namespace Database\Seeders;

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

// Create admin user for testing
        User::create([
            'name' => 'Admin',
            'email' => 'neica@admin.com',
            'password' => bcrypt('admin123'),
            'is_admin' => true,
            'email_verified_at' => now(),
        ]);

        // Create a sample project for testing
        \App\Models\Project::create([
            'title' => 'Eau Potable pour Tous',
            'slug' => 'eau-potable-pour-tous',
            'description' => 'Providing clean water access to rural communities.',
            'target_audience' => 'Rural communities',
            'impact' => '500 people',
            'goal_amount' => 10000,
            'current_amount' => 2500,
            'status' => 'active',
            'image' => null,
        ]);
    }
}
