<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\Track;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    protected $model = Student::class;

    public function definition()
    {
        // Make sure at least one track exists, or create one
        $track = Track::inRandomOrder()->first() ?? Track::factory()->create();

        return [
            'name' => $this->faker->name,
            'address' => $this->faker->address,
            'email' => $this->faker->unique()->safeEmail,
            'gender' => $this->faker->randomElement(['male', 'female']),
            'phone' => $this->faker->phoneNumber,
            'image' => 'default.png',
            'track_id' => $track->id,
        ];
    }
}
