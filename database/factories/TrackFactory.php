<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Course;


class TrackFactory extends Factory
{
    public function definition(): array
{
    $course = Course::inRandomOrder()->first() ?? Course::factory()->create();
    return [
        'name' => $this->faker->word,
        'description' => $this->faker->sentence,
        'img' => 'default.png',
        'course_id' => Course::inRandomOrder()->first()->id, // ✅ assign a course
    ];
}
}