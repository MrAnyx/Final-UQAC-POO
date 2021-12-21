<?php

namespace App\aop\Aspect;

use Go\Aop\Aspect;
use Go\Aop\Intercept\MethodInvocation;
use Go\Lang\Annotation\Around;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

/**
 * Monitor aspect
 */
class MustBeAuthenticatedAspect implements Aspect {

   /**
    * Method that will be called around real method
    *
    * @param MethodInvocation $invocation Invocation
    * @Around("@execution(App\aop\Annotation\MustBeAuthenticated)", order=-128)
    *
    */
   public function checkAroundMethod(MethodInvocation $invocation) {
      if (Auth::user() === null) {
         Log::info("Anonymous user was redirect to /login page");
         return redirect()->route('login');
      } else {
         return $invocation->proceed();
      }
   }
}