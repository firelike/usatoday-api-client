<?php
namespace Firelike\USAToday;

use Laminas\ModuleManager\Feature\ConsoleUsageProviderInterface;
use Laminas\Console\Adapter\AdapterInterface as Console;

class Module implements ConsoleUsageProviderInterface
{

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }


    public function getConsoleUsage(Console $console)
    {
        return array(
            // Describe available commands
            'usatoday fetch-booklists [--limit=] [--verbose|-v]' => 'fetch usa today booklists',
            'usatoday fetch-dates [--limit=] [--verbose|-v]' => 'fetch usa today dates',
            'usatoday fetch-categories [--limit=] [--verbose|-v]' => 'fetch usa today categories',

            // Describe expected parameters
            array(
                '--limit',
                '(optional) limit',
                '--sleep',
                '(optional) seconds to sleep',
                '--verbose|-v',
                '(optional) turn on verbose mode'
            ),
        );
    }
}