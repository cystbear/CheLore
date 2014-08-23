<?php

/*
 * This file is part of the Sonata project.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Che\CheLoreMongoDBAdminBundle\DependencyInjection\Compiler;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;

/*
 *
 * @author Thomas Rabaix <thomas.rabaix@sonata-project.org>
 */
class AddTemplatesCompilerPass implements CompilerPassInterface
{
    /**
     * {@inheritDoc}
     */
    public function process(ContainerBuilder $container)
    {
        foreach ($container->findTaggedServiceIds('sonata.admin') as $id => $attributes) {

            if (!isset($attributes[0]['manager_type']) || $attributes[0]['manager_type'] != 'doctrine_mongodb') {
                continue;
            }

            $definition = $container->getDefinition($id);
            $definition->addMethodCall('setFormTheme', array(['CheLoreMongoDBAdminBundle:Form:che_form_admin_fields.html.twig']));
        }
    }
}
