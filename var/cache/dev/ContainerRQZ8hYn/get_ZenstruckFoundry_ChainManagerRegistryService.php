<?php

namespace ContainerRQZ8hYn;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ZenstruckFoundry_ChainManagerRegistryService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.zenstruck_foundry.chain_manager_registry' shared service.
     *
     * @return \Zenstruck\Foundry\ChainManagerRegistry
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'zenstruck'.\DIRECTORY_SEPARATOR.'foundry'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'ChainManagerRegistry.php';

        return $container->privates['.zenstruck_foundry.chain_manager_registry'] = new \Zenstruck\Foundry\ChainManagerRegistry([0 => ($container->services['doctrine'] ?? $container->getDoctrineService())]);
    }
}
