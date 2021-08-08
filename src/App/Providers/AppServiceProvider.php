<?php

namespace App\Providers;

use App\Courses\Components\CourseIndex;
use App\Courses\Livewire\Index;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Livewire::component('course-index', CourseIndex::class);
    }
}
