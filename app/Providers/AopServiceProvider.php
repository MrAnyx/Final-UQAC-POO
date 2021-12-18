<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AopServiceProvider extends ServiceProvider {
   /**
    * Register services.
    *
    * @return void
    */
   public function register() {

   }

   /**
    * Bootstrap services.
    *
    * @return void
    */
   public function boot() {
      // Initialize an application aspect container
      $applicationAspectKernel = \App\aop\ApplicationAspectKernel::getInstance();
      $applicationAspectKernel->init([
         'debug' => true, // use 'false' for production mode
         'appDir' => base_path(), // Application root directory
         'cacheDir' => storage_path('app/aspect'), // Cache directory
         // Include paths restricts the directories where aspects should be applied, or empty for all source files
         'includePaths' => [
            base_path() . "/app/",
         ],
      ]);
   }
}
