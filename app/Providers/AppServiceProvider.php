<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//use Illuminate\Support\Facades\Vite;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // use bootstrap pagination
        \Illuminate\Pagination\Paginator::useBootstrap();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
//        Vite::useScriptTagAttributes([
//            'defer' => true, // Specify an attribute without a value...
//        ]);
    }
}
