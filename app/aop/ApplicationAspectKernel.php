<?php
namespace App\aop;

use App\aop\Aspect\LoggingAspect;
use App\aop\Aspect\MustBeAuthenticatedAspect;
use Go\Core\AspectContainer;
use Go\Core\AspectKernel;

/**
 * Application Aspect Kernel
 */
class ApplicationAspectKernel extends AspectKernel {

   /**
    * Configure an AspectContainer with advisors, aspects and pointcuts
    *
    * @param AspectContainer $container
    *
    * @return void
    */
   protected function configureAop(AspectContainer $container) {
      $container->registerAspect(new LoggingAspect());
      $container->registerAspect(new MustBeAuthenticatedAspect());
   }
}