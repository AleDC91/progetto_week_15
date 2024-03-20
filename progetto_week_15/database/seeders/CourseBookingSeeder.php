<?php

namespace Database\Seeders;

use App\Models\CourseBooking;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseBookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CourseBooking::factory(300)->create();
        // non sforare users x courses. 
    }
}
