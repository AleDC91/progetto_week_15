<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function courses() : BelongsToMany {
        return $this->belongsToMany(Course::class, 'course_bookings'); 
    }

    public function instructors(): HasManyThrough
    {
        return $this->hasManyThrough(Instructor::class, CourseBooking::class, 'user_id', 'id', 'id', 'course_id');
    }

    public function courseBooked()
    {
        return $this->belongsToMany(Course::class, 'course_bookings')
                    ->withPivot('status');
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }
}
