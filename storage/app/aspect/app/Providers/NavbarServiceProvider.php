<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class NavbarServiceProvider__AopProxied extends ServiceProvider {
   /**
    * Register any application services.
    *
    * @return void
    */
   public function register() {
      //
   }

   /**
    * Bootstrap any application services.
    *
    * @return void
    */
   public function boot() {
      View::share('allDepartments', DB::table("departments")->get());
   }
}
include_once AOP_CACHE_DIR . '/_proxies/app/Providers/NavbarServiceProvider.php/App/Providers/NavbarServiceProvider.php';
