<?php

namespace Zf2Tus\Controller\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zf2Tus\Controller\IndexController;

class IndexControllerFactory implements FactoryInterface {

    public function createService(ContainerInterface $container): IndexController
    {
        if (\method_exists($container, 'getServiceLocator')) {
            $container = $container->getServiceLocator();
        }

        return $this($container, null);
    }

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): IndexController {
        return new IndexController($container->get('Config'));
    }
}
