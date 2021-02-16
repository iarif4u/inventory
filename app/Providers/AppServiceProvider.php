<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;
use Illuminate\Support\Facades\Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Inertia::share('flash', function () {
            return [
                'success' => Session::get('success'),
            ];
        });
        Inertia::share('success', function () {
            return Session::get('success');
        });
        Inertia::share('errors', function () {
            return Session::get('errors') ? Session::get('errors')->getBag('default')->getMessages() : (object) [];
        });
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
