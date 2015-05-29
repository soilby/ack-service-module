<?php
namespace Soil\AckServiceModule;

/**
 * Created by PhpStorm.
 * User: fliak
 * Date: 4.2.15
 * Time: 22.29
 */

use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\LocatorRegisteredInterface;
use Zend\Mvc\MvcEvent;

class Module implements
    ConfigProviderInterface,
    AutoloaderProviderInterface,
    LocatorRegisteredInterface

{

    /**
     * {@inheritdoc}
     */
    public function getConfig()
    {
        $config = [];
        foreach (glob(__DIR__ . '/src/config/*.config.php') as $file) {
            /** @noinspection PhpIncludeInspection */
            $config = array_merge($config, include $file);
        }

        return $config;
    }

    /**
     * {@inheritdoc}
     */
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            )
        );
    }

    public function onBootstrap(\Zend\Mvc\MvcEvent $e){

    }

} 