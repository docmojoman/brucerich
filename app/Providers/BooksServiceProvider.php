<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BooksServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Books View Composer
        view()->composer('partials.header', function ($view)
        {
            $view->with('books', \App\Book::books());
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
