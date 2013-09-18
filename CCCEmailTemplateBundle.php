<?php

namespace CCC\EmailTemplateBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use CCC\EmailTemplateBundle\DependencyInjection\Compiler\TwigFormPass;

class CCCEmailTemplateBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new TwigFormPass());
    }
}
