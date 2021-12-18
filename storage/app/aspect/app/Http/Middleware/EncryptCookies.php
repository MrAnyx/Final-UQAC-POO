<?php

namespace App\Http\Middleware;

use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;

class EncryptCookies__AopProxied extends Middleware
{
    /**
     * The names of the cookies that should not be encrypted.
     *
     * @var array
     */
    protected $except = [
        //
    ];
}
include_once AOP_CACHE_DIR . '/_proxies/app/Http/Middleware/EncryptCookies.php/App/Http/Middleware/EncryptCookies.php';
