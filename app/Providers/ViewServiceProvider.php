<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Article;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
       $this->composeNavigation();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function composeNavigation()
    {
        view()->composer('organs/header', function($view)
        {
            $view->with('latest', Article::latest()->first());
        });
    }
}
