<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken__AopProxied extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
    ];
}
include_once AOP_CACHE_DIR . '/_proxies/app/Http/Middleware/VerifyCsrfToken.php/App/Http/Middleware/VerifyCsrfToken.php';
