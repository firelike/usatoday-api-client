<?php
namespace Firelike\USAToday\Service\Factory;


use Firelike\USAToday\Service\BestSellersService;
use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;


class BestSellersServiceFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $sm, $requestedName, array $options = null)
    {
        $service = new BestSellersService();

        $config = $sm->get('Config');
        if (isset($config['usat_service'])) {

            if (isset($config['usat_service']['service_url'])) {
                $service->setServiceUrl($config['usat_service']['service_url']);
            }

            if (isset($config['usat_service']['api_key'])) {
                $service->setApiKey($config['usat_service']['api_key']);
            }

        }

        return $service;
    }

}