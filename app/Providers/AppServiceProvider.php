<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;

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
    public function boot(): void
    {
        if (str_contains(request()->getHost(), 'sharedwithexpose.com')) {
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }
        Paginator::useBootstrapFive();

        View::composer('partials.navbar', function ($view) {
            $view->with('categories', Category::all());
        });

    }
}
