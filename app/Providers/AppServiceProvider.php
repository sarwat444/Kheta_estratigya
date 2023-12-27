<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use App\Observers\CourseObserver;
use App\Models\Course;

class AppServiceProvider extends ServiceProvider
{

    public function register():void
    {
    }

    public function boot():void
    {
        Course::observe(CourseObserver::class);
        Model::preventLazyLoading();
        Model::unguard();
    }
}
