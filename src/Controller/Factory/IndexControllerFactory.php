<?php

namespace Zf2Tus\Controller\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class IndexControllerFactory implements FactoryInterface {
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        return new \Zf2Tus\Controller\IndexController($container->get('Config'));
    }
}
