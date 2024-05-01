<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\AnalyticsController;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // // View composer for 'layouts.analytics' view
        // View::composer('layouts.analytics', function ($view) {
        //     // Retrieve data from the AnalyticsController
        //     $analyticsController = new AnalyticsController();
        //     $data = $analyticsController->analytics();

        //     dd($data);

        //     // Pass the data to the view
        //     $view->with($data);
        // });

        // // View composer for 'layouts.dashboard' view
        // View::composer('layouts.dashboard', function ($view) {
        //     // Retrieve data from the AnalyticsController
        //     $analyticsController = new AnalyticsController();
        //     $data = $analyticsController->analytics();



        //     // Pass the data to the view
        //     $view->with($data);
        // });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
