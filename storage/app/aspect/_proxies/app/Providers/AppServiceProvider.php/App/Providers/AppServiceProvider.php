<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider as ServiceProvider;

class AppServiceProvider extends AppServiceProvider__AopProxied implements \Go\Aop\Proxy
{
    /**
     * List of applied advices per class
     */
    private static $__joinPoints = [
        'method' => [
            'register' => [
                'advisor.App\\aop\\Aspect\\LoggingAspect->testLogging',
            ],
            'boot' => [
                'advisor.App\\aop\\Aspect\\LoggingAspect->testLogging',
            ],
            '__construct' => [
                'advisor.App\\aop\\Aspect\\LoggingAspect->testLogging',
            ],
            'booting' => [
                'advisor.App\\aop\\Aspect\\LoggingAspect->testLogging',
            ],
            'booted' => [
                'advisor.App\\aop\\Aspect\\LoggingAspect->testLogging',
            ],
            'callBootingCallbacks' => [
                'advisor.App\\aop\\Aspect\\LoggingAspect->testLogging',
            ],
            'callBootedCallbacks' => [
                'advisor.App\\aop\\Aspect\\LoggingAspect->testLogging',
            ],
            'commands' => [
                'advisor.App\\aop\\Aspect\\LoggingAspect->testLogging',
            ],
            'provides' => [
                'advisor.App\\aop\\Aspect\\LoggingAspect->testLogging',
            ],
            'when' => [
                'advisor.App\\aop\\Aspect\\LoggingAspect->testLogging',
            ],
            'isDeferred' => [
                'advisor.App\\aop\\Aspect\\LoggingAspect->testLogging',
            ],
        ],
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        return self::$__joinPoints['method:register']->__invoke($this);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        return self::$__joinPoints['method:boot']->__invoke($this);
    }

    /**
     * Create a new service provider instance.
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     * @return void
     */
    public function __construct($app)
    {
        return self::$__joinPoints['method:__construct']->__invoke($this, [$app]);
    }

    /**
     * Register a booting callback to be run before the "boot" method is called.
     *
     * @param  \Closure  $callback
     * @return void
     */
    public function booting(\Closure $callback)
    {
        return self::$__joinPoints['method:booting']->__invoke($this, [$callback]);
    }

    /**
     * Register a booted callback to be run after the "boot" method is called.
     *
     * @param  \Closure  $callback
     * @return void
     */
    public function booted(\Closure $callback)
    {
        return self::$__joinPoints['method:booted']->__invoke($this, [$callback]);
    }

    /**
     * Call the registered booting callbacks.
     *
     * @return void
     */
    public function callBootingCallbacks()
    {
        return self::$__joinPoints['method:callBootingCallbacks']->__invoke($this);
    }

    /**
     * Call the registered booted callbacks.
     *
     * @return void
     */
    public function callBootedCallbacks()
    {
        return self::$__joinPoints['method:callBootedCallbacks']->__invoke($this);
    }

    /**
     * Register the package's custom Artisan commands.
     *
     * @param  array|mixed  $commands
     * @return void
     */
    public function commands($commands)
    {
        return self::$__joinPoints['method:commands']->__invoke($this, [$commands]);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return self::$__joinPoints['method:provides']->__invoke($this);
    }

    /**
     * Get the events that trigger this service provider to register.
     *
     * @return array
     */
    public function when()
    {
        return self::$__joinPoints['method:when']->__invoke($this);
    }

    /**
     * Determine if the provider is deferred.
     *
     * @return bool
     */
    public function isDeferred()
    {
        return self::$__joinPoints['method:isDeferred']->__invoke($this);
    }
}
\Go\Proxy\ClassProxyGenerator::injectJoinPoints(AppServiceProvider::class);