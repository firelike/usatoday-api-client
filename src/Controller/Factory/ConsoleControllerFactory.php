<?php
namespace Firelike\USAToday\Controller\Factory;


use Firelike\USAToday\Controller\ConsoleController;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;


class ConsoleControllerFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $sm, $requestedName, array $options = null)
    {

        $service = $sm->get('Firelike\USAToday\Service\BestSellersService');

        $controller = new ConsoleController();
        $controller->setService($service);

        return $controller;

    }

}