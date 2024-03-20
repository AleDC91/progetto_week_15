<?php

namespace Database\Factories;

use App\Models\Instructor;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDate = Carbon::parse(fake()->dateTimeBetween('-1 years', '+4 months')->format('Y-m-d'));

        $minEndDate = $startDate->copy()->addMonths(3);
        $maxEndDate = $startDate->copy()->addMonths(12);
        $endDate = Carbon::parse(fake()->dateTimeBetween($minEndDate, $maxEndDate)->format('Y-m-d'));
        // dd($startDate, $minEndDate, $maxEndDate,$endDate);
                
        $totalSeats = fake()->numberBetween(10, 20);
        // $bookedSeats = fake()->numberBetween(0, $totalSeats);

        return [
            "name" => rtrim(fake()->text(15), '.'),
            'description' => fake()->sentence(15),
            'instructor_id' => Instructor::inRandomOrder()->first()->id,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'difficulty' => fake()->randomElement(['beginner', 'intermediate', 'Advanced']),
            'monthly_cost' => fake()->numberBetween(3, 20) * 1000,
            'total_seats' => $totalSeats,
            // 'booked_seats' => $bookedSeats,

        ];
    }
}
