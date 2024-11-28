<?php

namespace App\Providers;

use App\Models\Course;
use App\Models\Role;
use App\Policies\CoursePolicy;
use App\Policies\RolePolicy;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies =[
        Course::class => CoursePolicy::class,
        Role::class => RolePolicy::class,
    ];
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
