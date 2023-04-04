<?php

namespace ContainerQMPYmxL;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ZenstruckFoundry_ConfigurationService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public '.zenstruck_foundry.configuration' shared service.
     *
     * @return \Zenstruck\Foundry\Configuration
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'zenstruck'.\DIRECTORY_SEPARATOR.'foundry'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Configuration.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'zenstruck'.\DIRECTORY_SEPARATOR.'foundry'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'StoryManager.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'zenstruck'.\DIRECTORY_SEPARATOR.'foundry'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'ModelFactoryManager.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'zenstruck'.\DIRECTORY_SEPARATOR.'foundry'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Instantiator.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'fakerphp'.\DIRECTORY_SEPARATOR.'faker'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Faker'.\DIRECTORY_SEPARATOR.'Generator.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'fakerphp'.\DIRECTORY_SEPARATOR.'faker'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Faker'.\DIRECTORY_SEPARATOR.'Factory.php';

        $container->services['.zenstruck_foundry.configuration'] = $instance = new \Zenstruck\Foundry\Configuration([], [], 'schema', []);

        $instance->setManagerRegistry(($container->privates['.zenstruck_foundry.chain_manager_registry'] ?? $container->load('get_ZenstruckFoundry_ChainManagerRegistryService')));
        $instance->setStoryManager(new \Zenstruck\Foundry\StoryManager(new RewindableGenerator(function () use ($container) {
            return new \EmptyIterator();
        }, 0)));
        $instance->setModelFactoryManager(new \Zenstruck\Foundry\ModelFactoryManager(new RewindableGenerator(function () use ($container) {
            yield 0 => ($container->privates['App\\Factory\\CampusFactory'] ??= new \App\Factory\CampusFactory());
            yield 1 => ($container->privates['App\\Factory\\MakeFactory'] ??= new \App\Factory\MakeFactory());
            yield 2 => ($container->privates['App\\Factory\\PhoneFactory'] ??= new \App\Factory\PhoneFactory());
            yield 3 => ($container->privates['App\\Factory\\StudentFactory'] ??= new \App\Factory\StudentFactory());
            yield 4 => ($container->privates['App\\Factory\\UserFactory'] ?? $container->load('getUserFactoryService'));
        }, 5)));
        $instance->setInstantiator(new \Zenstruck\Foundry\Instantiator());
        $instance->setFaker(\Faker\Factory::create());
        $instance->enableDefaultProxyAutoRefresh();

        return $instance;
    }
}
