<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider__AopProxied extends ServiceProvider
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
    }
}
include_once AOP_CACHE_DIR . '/_proxies/app/Providers/AppServiceProvider.php/App/Providers/AppServiceProvider.php';
