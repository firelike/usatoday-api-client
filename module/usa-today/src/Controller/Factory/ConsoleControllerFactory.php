<?php
namespace USAToday\Controller\Factory;


use USAToday\Controller\ConsoleController;
use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;


class ConsoleControllerFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $sm, $requestedName, array $options = null)
    {

        $service = $sm->get('USAToday\Service\BestSellersService');

        $controller = new ConsoleController();
        $controller->setService($service);

        return $controller;

    }

}