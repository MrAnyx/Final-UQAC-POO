<?php
namespace App\Http\Middleware;

use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;

class EncryptCookies extends EncryptCookies__AopProxied implements \Go\Aop\Proxy
{
    /**
     * List of applied advices per class
     */
    private static $__joinPoints = [
        'method' => [
            '__construct' => [
                'advisor.App\\aop\\Aspect\\LoggingAspect->testLogging',
            ],
            'disableFor' => [
                'advisor.App\\aop\\Aspect\\LoggingAspect->testLogging',
            ],
            'handle' => [
                'advisor.App\\aop\\Aspect\\LoggingAspect->testLogging',
            ],
            'isDisabled' => [
                'advisor.App\\aop\\Aspect\\LoggingAspect->testLogging',
            ],
        ],
    ];

    /**
     * Create a new CookieGuard instance.
     *
     * @param  \Illuminate\Contracts\Encryption\Encrypter  $encrypter
     * @return void
     */
    public function __construct(\Illuminate\Contracts\Encryption\Encrypter $encrypter)
    {
        return self::$__joinPoints['method:__construct']->__invoke($this, [$encrypter]);
    }

    /**
     * Disable encryption for the given cookie name(s).
     *
     * @param  string|array  $name
     * @return void
     */
    public function disableFor($name)
    {
        return self::$__joinPoints['method:disableFor']->__invoke($this, [$name]);
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle($request, \Closure $next)
    {
        return self::$__joinPoints['method:handle']->__invoke($this, [$request, $next]);
    }

    /**
     * Determine whether encryption has been disabled for the given cookie.
     *
     * @param  string  $name
     * @return bool
     */
    public function isDisabled($name)
    {
        return self::$__joinPoints['method:isDisabled']->__invoke($this, [$name]);
    }
}
\Go\Proxy\ClassProxyGenerator::injectJoinPoints(EncryptCookies::class);