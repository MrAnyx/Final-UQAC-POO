<?php
namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends Kernel__AopProxied implements \Go\Aop\Proxy
{
    /**
     * List of applied advices per class
     */
    private static $__joinPoints = [
        'method' => [
            '__construct' => [
                'advisor.App\\aop\\Aspect\\LoggingAspect->testLogging',
            ],
            'handle' => [
                'advisor.App\\aop\\Aspect\\LoggingAspect->testLogging',
            ],
            'bootstrap' => [
                'advisor.App\\aop\\Aspect\\LoggingAspect->testLogging',
            ],
            'terminate' => [
                'advisor.App\\aop\\Aspect\\LoggingAspect->testLogging',
            ],
            'hasMiddleware' => [
                'advisor.App\\aop\\Aspect\\LoggingAspect->testLogging',
            ],
            'prependMiddleware' => [
                'advisor.App\\aop\\Aspect\\LoggingAspect->testLogging',
            ],
            'pushMiddleware' => [
                'advisor.App\\aop\\Aspect\\LoggingAspect->testLogging',
            ],
            'prependMiddlewareToGroup' => [
                'advisor.App\\aop\\Aspect\\LoggingAspect->testLogging',
            ],
            'appendMiddlewareToGroup' => [
                'advisor.App\\aop\\Aspect\\LoggingAspect->testLogging',
            ],
            'prependToMiddlewarePriority' => [
                'advisor.App\\aop\\Aspect\\LoggingAspect->testLogging',
            ],
            'appendToMiddlewarePriority' => [
                'advisor.App\\aop\\Aspect\\LoggingAspect->testLogging',
            ],
            'getMiddlewarePriority' => [
                'advisor.App\\aop\\Aspect\\LoggingAspect->testLogging',
            ],
            'getMiddlewareGroups' => [
                'advisor.App\\aop\\Aspect\\LoggingAspect->testLogging',
            ],
            'getRouteMiddleware' => [
                'advisor.App\\aop\\Aspect\\LoggingAspect->testLogging',
            ],
            'getApplication' => [
                'advisor.App\\aop\\Aspect\\LoggingAspect->testLogging',
            ],
            'setApplication' => [
                'advisor.App\\aop\\Aspect\\LoggingAspect->testLogging',
            ],
        ],
    ];

    /**
     * Create a new HTTP kernel instance.
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function __construct(\Illuminate\Contracts\Foundation\Application $app, \Illuminate\Routing\Router $router)
    {
        return self::$__joinPoints['method:__construct']->__invoke($this, [$app, $router]);
    }

    /**
     * Handle an incoming HTTP request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function handle($request)
    {
        return self::$__joinPoints['method:handle']->__invoke($this, [$request]);
    }

    /**
     * Bootstrap the application for HTTP requests.
     *
     * @return void
     */
    public function bootstrap()
    {
        return self::$__joinPoints['method:bootstrap']->__invoke($this);
    }

    /**
     * Call the terminate method on any terminable middleware.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Http\Response  $response
     * @return void
     */
    public function terminate($request, $response)
    {
        return self::$__joinPoints['method:terminate']->__invoke($this, [$request, $response]);
    }

    /**
     * Determine if the kernel has a given middleware.
     *
     * @param  string  $middleware
     * @return bool
     */
    public function hasMiddleware($middleware)
    {
        return self::$__joinPoints['method:hasMiddleware']->__invoke($this, [$middleware]);
    }

    /**
     * Add a new middleware to the beginning of the stack if it does not already exist.
     *
     * @param  string  $middleware
     * @return $this
     */
    public function prependMiddleware($middleware)
    {
        return self::$__joinPoints['method:prependMiddleware']->__invoke($this, [$middleware]);
    }

    /**
     * Add a new middleware to end of the stack if it does not already exist.
     *
     * @param  string  $middleware
     * @return $this
     */
    public function pushMiddleware($middleware)
    {
        return self::$__joinPoints['method:pushMiddleware']->__invoke($this, [$middleware]);
    }

    /**
     * Prepend the given middleware to the given middleware group.
     *
     * @param  string  $group
     * @param  string  $middleware
     * @return $this
     *
     * @throws \InvalidArgumentException
     */
    public function prependMiddlewareToGroup($group, $middleware)
    {
        return self::$__joinPoints['method:prependMiddlewareToGroup']->__invoke($this, [$group, $middleware]);
    }

    /**
     * Append the given middleware to the given middleware group.
     *
     * @param  string  $group
     * @param  string  $middleware
     * @return $this
     *
     * @throws \InvalidArgumentException
     */
    public function appendMiddlewareToGroup($group, $middleware)
    {
        return self::$__joinPoints['method:appendMiddlewareToGroup']->__invoke($this, [$group, $middleware]);
    }

    /**
     * Prepend the given middleware to the middleware priority list.
     *
     * @param  string  $middleware
     * @return $this
     */
    public function prependToMiddlewarePriority($middleware)
    {
        return self::$__joinPoints['method:prependToMiddlewarePriority']->__invoke($this, [$middleware]);
    }

    /**
     * Append the given middleware to the middleware priority list.
     *
     * @param  string  $middleware
     * @return $this
     */
    public function appendToMiddlewarePriority($middleware)
    {
        return self::$__joinPoints['method:appendToMiddlewarePriority']->__invoke($this, [$middleware]);
    }

    /**
     * Get the priority-sorted list of middleware.
     *
     * @return array
     */
    public function getMiddlewarePriority()
    {
        return self::$__joinPoints['method:getMiddlewarePriority']->__invoke($this);
    }

    /**
     * Get the application's route middleware groups.
     *
     * @return array
     */
    public function getMiddlewareGroups()
    {
        return self::$__joinPoints['method:getMiddlewareGroups']->__invoke($this);
    }

    /**
     * Get the application's route middleware.
     *
     * @return array
     */
    public function getRouteMiddleware()
    {
        return self::$__joinPoints['method:getRouteMiddleware']->__invoke($this);
    }

    /**
     * Get the Laravel application instance.
     *
     * @return \Illuminate\Contracts\Foundation\Application
     */
    public function getApplication()
    {
        return self::$__joinPoints['method:getApplication']->__invoke($this);
    }

    /**
     * Set the Laravel application instance.
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     * @return $this
     */
    public function setApplication(\Illuminate\Contracts\Foundation\Application $app)
    {
        return self::$__joinPoints['method:setApplication']->__invoke($this, [$app]);
    }
}
\Go\Proxy\ClassProxyGenerator::injectJoinPoints(Kernel::class);