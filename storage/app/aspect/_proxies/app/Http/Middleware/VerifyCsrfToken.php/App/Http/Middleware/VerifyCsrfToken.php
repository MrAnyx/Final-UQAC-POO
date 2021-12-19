<?php
namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends VerifyCsrfToken__AopProxied implements \Go\Aop\Proxy
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
            'shouldAddXsrfTokenCookie' => [
                'advisor.App\\aop\\Aspect\\LoggingAspect->testLogging',
            ],
        ],
    ];

    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     * @param  \Illuminate\Contracts\Encryption\Encrypter  $encrypter
     * @return void
     */
    public function __construct(\Illuminate\Contracts\Foundation\Application $app, \Illuminate\Contracts\Encryption\Encrypter $encrypter)
    {
        return self::$__joinPoints['method:__construct']->__invoke($this, [$app, $encrypter]);
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     *
     * @throws \Illuminate\Session\TokenMismatchException
     */
    public function handle($request, \Closure $next)
    {
        return self::$__joinPoints['method:handle']->__invoke($this, [$request, $next]);
    }

    /**
     * Determine if the cookie should be added to the response.
     *
     * @return bool
     */
    public function shouldAddXsrfTokenCookie()
    {
        return self::$__joinPoints['method:shouldAddXsrfTokenCookie']->__invoke($this);
    }
}
\Go\Proxy\ClassProxyGenerator::injectJoinPoints(VerifyCsrfToken::class);