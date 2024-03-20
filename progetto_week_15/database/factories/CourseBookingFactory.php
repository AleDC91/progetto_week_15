<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\CourseBooking;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CourseBooking>
 */
class CourseBookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'course_id' => Course::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }


    public function configure()
    {
        return $this->afterCreating(function (CourseBooking $courseBooking) {
            // controllo se esiste già la coppia corso-utente, per non avere la 
            // lo stesso utente che partecipa più volte allo stesso corso
            $existingRecord = CourseBooking::where('user_id', $courseBooking->user_id)
                ->where('course_id', $courseBooking->course_id)
                ->orderByDesc('id') 
                ->first();

            // Se trovi corrispondenza, cancellala
            if ($existingRecord && $existingRecord->id !== $courseBooking->id) {
                $existingRecord->delete();
            }
        });
    }
}
