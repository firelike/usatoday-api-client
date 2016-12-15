<?php
namespace USATodayTest\Service;


/**
 * \USAToday\Service\BestSellersService test case.
 */
class BestSellersServiceTest extends \PHPUnit_Framework_TestCase
{

    /**
     *
     * @var \USAToday\Service\USAToday
     */
    private $service;


    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->service = new \USAToday\Service\BestSellersService();
    }


    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->service = null;

        parent::tearDown();
    }


    /**
     * Tests \USAToday\Service\USAToday->__construct()
     */
    public function test__construct()
    {
        $this->assertInstanceOf('\USAToday\Service\BestSellersService', $this->service);
    }


    /**
     * Tests \USAToday\Service\USAToday->booklists()
     */
    public function testBooklists()
    {
        $this->markTestIncomplete("booklists test not implemented");

        $this->service->booklists(/* parameters */);
    }


    /**
     * Tests \USAToday\Service\USAToday->dates()
     */
    public function testDates()
    {
        $this->markTestIncomplete("dates test not implemented");

        $this->service->dates(/* parameters */);
    }


    /**
     * Tests \USAToday\Service\USAToday->categories()
     */
    public function testCategories()
    {
        $this->markTestIncomplete("categories test not implemented");

        $this->service->categories(/* parameters */);
    }
}

