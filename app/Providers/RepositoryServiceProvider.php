<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\AdminRepository\AdminRepositoryInterface', 
            'App\Repositories\AdminRepository\AdminRepository'
        );
        $this->app->bind(
            'App\Repositories\BookRepository\BookRepositoryInterface',
            'App\Repositories\BookRepository\BookRepository'
        );
        $this->app->bind(
            'App\Repositories\CourseRepository\CourseRepositoryInterface',
            'App\Repositories\CourseRepository\CourseRepository'
        );
        $this->app->bind(
            'App\Repositories\InstructorRepository\InstructorRepositoryInterface',
            'App\Repositories\InstructorRepository\InstructorRepository'
        );
        $this->app->bind(
            'App\Repositories\StudentRepository\StudentRepositoryInterface',
            'App\Repositories\StudentRepository\StudentRepository'
        );
        $this->app->bind(
            'App\Repositories\ReviewRepository\ReviewRepositoryInterface',
            'App\Repositories\ReviewRepository\ReviewRepository'
        );
    }
}
