<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator; // Import the Paginator class
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // $Item = MenuItem::where('Stutas', 'Enable')->get();
        // view()->share('Item', $Item);

        // Use Bootstrap 5 styling for pagination
        Paginator::useBootstrapFive();
    }
}
