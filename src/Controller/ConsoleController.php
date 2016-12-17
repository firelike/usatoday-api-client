<?php
namespace Firelike\USAToday\Controller;

use Zend\Mvc\Console\Controller\AbstractConsoleController;


class ConsoleController extends AbstractConsoleController
{
    /**
     * @var \Firelike\USAToday\Service\BestSellersService
     */
    protected $service;

    public function fetchBooklistsAction()
    {
        $this->markBegin();

        $request = $this->getRequest();
        $verbose = $request->getParam('verbose') || $request->getParam('v');
        $limit = $request->getParam('limit');

        if (!$limit) {
            $limit = 50;
        }

        if ($verbose) {
            $this->getConsole()->writeLine(sprintf("Limit selected: %s", $limit));
        }

        $options = array(
            'start' => 0,
            'limit' => $limit
        );
        $records = $this->getService()->booklists($options);
        var_dump($records);

        if ($verbose) {
            $this->getConsole()->writeLine("Done");
        }

        $this->markEnd();
    }

    public function fetchDatesAction()
    {
        $this->markBegin();

        $request = $this->getRequest();
        $verbose = $request->getParam('verbose') || $request->getParam('v');
        $limit = $request->getParam('limit');

        if (!$limit) {
            $limit = 50;
        }

        if ($verbose) {
            $this->getConsole()->writeLine(sprintf("Limit selected: %s", $limit));
        }

        $records = $this->getService()->dates();
        var_dump($records);

        if ($verbose) {
            $this->getConsole()->writeLine("Done");
        }

        $this->markEnd();
    }

    public function fetchCategoriesAction()
    {
        $this->markBegin();

        $request = $this->getRequest();
        $verbose = $request->getParam('verbose') || $request->getParam('v');
        $limit = $request->getParam('limit');

        if (!$limit) {
            $limit = 50;
        }

        if ($verbose) {
            $this->getConsole()->writeLine(sprintf("Limit selected: %s", $limit));
        }

        $options = array(
            'start' => 0,
            'limit' => $limit
        );
        $records = $this->getService()->categories($options);
        var_dump($records);


        if ($verbose) {
            $this->getConsole()->writeLine("Done");
        }

        $this->markEnd();
    }


    public function markBegin()
    {
        $this->getConsole()->writeLine('============== BEGIN ==============');
    }

    public function markEnd()
    {
        $this->getConsole()->writeLine('============== END ==============');
    }

    /**
     * @return \Firelike\USAToday\Service\BestSellersService
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param \Firelike\USAToday\Service\BestSellersService $service
     */
    public function setService($service)
    {
        $this->service = $service;
    }


}

