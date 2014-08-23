<?php

namespace Che\CheLoreMongoDBAdminBundle;

use Che\CheLoreMongoDBAdminBundle\DependencyInjection\Compiler\AddTemplatesCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class CheLoreMongoDBAdminBundle extends Bundle
{
    public function getParent()
    {
        return 'SonataDoctrineMongoDBAdminBundle';
    }

    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new AddTemplatesCompilerPass());
    }
}
