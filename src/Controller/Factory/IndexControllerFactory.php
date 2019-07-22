<?php

namespace Zf2Tus\Controller\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zf2Tus\Controller\IndexController;

class IndexControllerFactory implements FactoryInterface {
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        return new IndexController($container->get('Config'));
    }
}
