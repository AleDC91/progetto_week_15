<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'instructor_id',
        'start_date',
        'end_date',
        'difficulty',
        'montly_cost',
        'total_seats',
        'booked_seats'
    ];

    public function users(): BelongsToMany {
        return $this->belongsToMany(User::class, 'course_bookings');
    }

    public function instructor(): BelongsTo {
        return $this->belongsTo(Instructor::class);
    }
}
