<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Instructor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'hire_date',
        'speialization'
    ];

    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }

    public function users() : HasManyThrough
    {
        return $this->hasManyThrough(User::class, Course::class);
    }
}
