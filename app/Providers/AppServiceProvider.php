<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\TeacherRepositoryinterface;
use App\Repository\TeacherRepository;
use App\Repository\student\StudentRepositoryInterface;
use App\Repository\student\studentRepository;
use App\Repository\student\promotionRepositoryInterface;
use App\Repository\student\promotionRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TeacherRepositoryinterface::class, TeacherRepository::class);
        $this->app->bind(StudentRepositoryInterface::class, studentRepository::class);
        $this->app->bind( promotionRepositoryInterface::class, promotionRepository::class);

    }


    
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
