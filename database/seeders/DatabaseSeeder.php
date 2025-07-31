<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call(StudentSeeder::class);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

    \App\Models\Course::factory(5)->create(); // Create 5 courses first

    \App\Models\Track::factory(10)->create(); // Then create tracks

    \App\Models\Student::factory(20)->create(); // Then students if needed


    }


}
