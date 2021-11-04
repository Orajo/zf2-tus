<?php
namespace Zf2Tus;

use Laminas\Mvc\ModuleRouteListener;
use Laminas\Mvc\MvcEvent;
use Laminas\Stdlib\ArrayUtils;

class Module {

    public function onBootstrap(MvcEvent $e) {
        $eventManager = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
        defined('APPLICATION_DATA') || define('APPLICATION_DATA', __DIR__ . '/../../../data');
    }

    public function getConfig() {
        $config = array();
        $configFiles = array(
            __DIR__ . '/../config/module.config.php',
            __DIR__ . '/../config/router.config.php',
        );

        foreach ($configFiles as $configFile) {
            $config = ArrayUtils::merge($config, include $configFile);
        }
        return $config;
    }
}
