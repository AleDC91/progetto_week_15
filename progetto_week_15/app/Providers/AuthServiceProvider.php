<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Course;
use App\Models\CourseBooking;
use App\Models\User;
use App\Policies\CourseBookingPolicy;
use App\Policies\CoursePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Course::class => CoursePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('isAdmin', function(User $user){
            return $user->isAdmin();
        });
    }
}
