<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ArticleGroupsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // ArticleGroups View Composer
        view()->composer('partials.header', function ($view)
        {
            $view->with('articlegroups', \App\ArticleGroup::articlegroups());
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
