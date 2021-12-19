<?php

namespace App\aop\Aspect;

use Go\Aop\Aspect;
use Go\Aop\Intercept\MethodInvocation;
use Go\Lang\Annotation\Before;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

/**
 * Monitor aspect
 */
class LoggingAspect implements Aspect {

   // @Before("execution(public App\*->*(*))")
   // @Before("@execution(App\aop\Annotation\Logging)")

   /**
    * Method that will be called before real method
    *
    * @param MethodInvocation $invocation Invocation
    * @Before("@execution(App\aop\Annotation\Logging)", order=128)
    */
   public function loggingBeforeMethod(MethodInvocation $invocation) {
      $obj = $invocation->getThis();
      $user = Auth::user();
      $username = $user !== null ? $user->getAttributes()["name"] : "anonymous";

      $args = [];
      if ($invocation->getArguments() !== []) {
         for ($i = 0; $i < count($invocation->getArguments()); $i++) {
            $args[$invocation->getMethod()->getParameters()[$i]->getName()] = $invocation->getArguments()[$i];
         }
      }

      Log::info("Authenticated ({$username}) : " . get_class($obj) . "->" . $invocation->getMethod()->getName() . " with args : " . json_encode($args));
   }
}