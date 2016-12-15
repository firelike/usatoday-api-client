<?php
namespace USAToday\Controller;

use Zend\Mvc\Console\Controller\AbstractConsoleController;


class ConsoleController extends AbstractConsoleController
{
    /**
     * @var \USAToday\Service\BestSellersService
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
        $booklists= $this->getService()->booklists($options);

        foreach ($booklists as $booklist) {
            \Zend\Debug\Debug::dump($booklist);
        }

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

        $dates = $this->getService()->dates();
        foreach ($dates as $date) {
            var_dump($date);
        }

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
        $categories = $this->getService()->categories($options);

        foreach ($categories as $category) {
            var_dump($category);
        }


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
     * @return \USAToday\Service\BestSellersService
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param \USAToday\Service\BestSellersService $service
     */
    public function setService($service)
    {
        $this->service = $service;
    }


}

