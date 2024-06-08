<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\Page;
use App\Models\Generalsetting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
      

        view()->composer('*', function ($settings) {
            $settings->with('gs',Generalsetting::first());
            
            $settings->with('pages',Page::get());
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
    }
}
