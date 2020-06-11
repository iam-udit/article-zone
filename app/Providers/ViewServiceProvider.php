<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Allowing composer to bind data to views
        View::composer(
            ['welcome', 'pages.details', 'pages.category', 'auth.login', 'auth.register'],
            'App\Http\Composers\ViewComposer'
        );
    }
}
