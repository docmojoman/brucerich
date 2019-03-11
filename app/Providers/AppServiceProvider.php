<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Relation::morphMap([
            'article'       => 'App\Article',
            'articleGroup'  => 'App\ArticleGroup',
            'book'          => 'App\Book',
            'insight'       => 'App\Insight',
            'interview'     => 'App\Interview',
            'section'       => 'App\Section',
            'video'         => 'App\Video',
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
