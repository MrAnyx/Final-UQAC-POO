<?php

namespace App\aop\Aspect;

use App\Http\Controllers\MainController;
use Go\Aop\Aspect;
use Go\Aop\Intercept\MethodInvocation;
use Go\Lang\Annotation\Before;
use Illuminate\Support\Facades\Log;

/**
 * Monitor aspect
 */
class LoggingAspect implements Aspect {

   /**
    * Method that will be called before real method
    *
    * @param MethodInvocation $invocation Invocation
    * @Before("execution(public MainController->*(*))")
    */
   public function testLogging(MethodInvocation $invocation) {
      $obj = $invocation->getThis();
      Log::debug(get_class($obj) . "->" . $invocation->getMethod()->getName());
   }
}