<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class InsightsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        // Insights View Composer
        view()->composer('partials.header', function ($view)
        {
            $view->with('insights', \App\Insight::insights());
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
