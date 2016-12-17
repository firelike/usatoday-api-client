<?php
return array(
    'controllers' => array(
        'factories' => [
            'Firelike\USAToday\Controller\Console' => Firelike\USAToday\Controller\Factory\ConsoleControllerFactory::class,
        ]
    ),
    'service_manager' => array(
        'factories' => array(
            Firelike\USAToday\Service\BestSellersService::class => Firelike\USAToday\Service\Factory\BestSellersServiceFactory::class
        )
    ),
    'console' => array(
        'router' => array(
            'routes' => array(
                'usatoday-fetch-booklists' => array(
                    'options' => array(
                        'route' => 'usatoday fetch-booklists [--limit=] [--verbose|-v]',
                        'defaults' => array(
                            'controller' => 'Firelike\USAToday\Controller\Console',
                            'action' => 'fetch-booklists'
                        )
                    )
                ),
                'usatoday-fetch-dates' => array(
                    'options' => array(
                        'route' => 'usatoday fetch-dates [--limit=] [--verbose|-v]',
                        'defaults' => array(
                            'controller' => 'Firelike\USAToday\Controller\Console',
                            'action' => 'fetch-dates'
                        )
                    )
                ),
                'usatoday-fetch-categories' => array(
                    'options' => array(
                        'route' => 'usatoday fetch-categories [--limit=] [--verbose|-v]',
                        'defaults' => array(
                            'controller' => 'Firelike\USAToday\Controller\Console',
                            'action' => 'fetch-categories'
                        )
                    )
                )
            )
        )
    )
);


