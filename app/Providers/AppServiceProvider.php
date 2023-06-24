<?php

namespace App\Providers;

use App\Setting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer('*', function ($view)
        {
            $siteSetting = cache()->rememberForever('siteSetting', function() {
                return Setting::pluck('value', 'key')->toArray();
            });
            // $siteSetting = Setting::pluck('value', 'key')->toArray(); 
            $view->with('siteSetting', $siteSetting);
        });
        Paginator::useBootstrap();
    }
}
