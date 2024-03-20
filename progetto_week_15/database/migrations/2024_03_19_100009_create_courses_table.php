<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->unsignedBigInteger('instructor_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('difficulty', ['beginner', 'intermediate', 'Advanced']);
            $table->integer('monthly_cost')->nullable();
            $table->integer('total_seats');
            // $table->integer('booked_seats');
            $table->timestamps();

            $table->foreign('instructor_id')
            ->references('id')
            ->on('instructors')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
