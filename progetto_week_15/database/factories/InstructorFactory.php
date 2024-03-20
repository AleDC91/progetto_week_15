<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Instructor>
 */
class InstructorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone_number' => fake()->phoneNumber(),
            'hire_date' => fake()->dateTimeBetween('-10 years', '-1 month')->format('Y-m-d'),
            'profile_image' => "https://picsum.photos/id/". rand(1, 999) ."/200/200",
            'specialization' => fake()->randomElement(['Personal Training', 'Group Fitness', 'Yoga and Pilates', 'Strength Training', 'Cardiovascular Training']),
            'bio' => fake()->sentence(15)
        ];
    }
}
