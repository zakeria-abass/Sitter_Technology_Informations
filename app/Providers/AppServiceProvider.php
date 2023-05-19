<?php

namespace App\Providers;

use App\Models\About;
use App\Models\Courses\Courses;
use App\Models\Projects\Projects;
use App\Models\Roles\Ability;
use App\Models\Roles\Roles;
use App\Models\Sections\Sections;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        View::share('sections',Sections::with('course')->get());
        View::share('users',User::with('cours','role')->get());
        View::share('courses',Courses::orderByDesc('id')->get());
        View::share('course',Courses::latest()->take(3)->get());
        View::share('projects',Projects::latest()->take(3)->paginate(3));
        View::share('about',About::first());
        View::share('abilits',Ability::get());
        View::share('roles',Roles::get());
        Paginator::useBootstrap();
    }
}
