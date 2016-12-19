<?php
namespace Firelike\USAToday\Service;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;

class BestSellersService
{
    /**
     * @var string
     */
    protected $apiKey;

    /**
     * @var string
     */
    protected $serviceUrl;


    public function booklists($options = array())
    {
        $defaultOptions = [
            'author' => '',
            'category' => '',
            'class' => '',
            'title' => '',
            'year' => '',
            'month' => '',
            'date' => '',
            'count' => '',
            'minyear' => '',
            'maxyear' => '',
            'encoding' => 'json',
            'apikey' => $this->getApiKey()
        ];

        $query = array_merge($defaultOptions, $options);

        $httpResponse = $this->apiCall('/booklists', array_filter($query));

        $arr = @json_decode($httpResponse->getBody(), true);

        if (empty($arr->BookLists)) {
            return false;
        }

        $bookLists = array_shift($arr->BookLists);

        $entries = array();
        foreach ($bookLists->BookListEntries as $entry) {
            $entries[] = (array)$entry;
        }

        return array(
            'BookListName' => $bookLists->Name,
            'BookListDate' => (array)$bookLists->BookListDate,
            'BookListEntries' => $entries
        );
    }


    public function dates()
    {
        $query = [
            'minyear' => '',
            'maxyear' => '',
            'encoding' => 'json',
            'apikey' => $this->getApiKey()
        ];

        $httpResponse = $this->apiCall('/dates', array_filter($query));

        $arr = @json_decode($httpResponse->getBody(), true);

        $dates = array();
        if (isset($arr['bookListDates'])) {
            foreach ($arr['bookListDates']['bookListDate'] as $date) {
                $dates[] = $date["@attributes"];
            }
        }
        return $dates;
    }


    public function categories($options = array())
    {
        $defaultOptions = [
            'author' => '',
            'class' => '',
            'title' => '',
            'year' => '',
            'minyear' => '',
            'maxyear' => '',
            'encoding' => 'json',
            'apikey' => $this->getApiKey()
        ];

        $query = array_merge($defaultOptions, $options);

        $httpResponse = $this->apiCall('/categories', array_filter($query));
        $arr = @json_decode($httpResponse->getBody(), true);

        $categories = array();
        if (isset($arr['categories'])) {
            foreach ($arr['categories']['category'] as $cat) {
                $categories[] = $cat["@attributes"];
            }
        }
        return $categories;
    }


    public function apiCall($path, $query)
    {
        try {

            $client = new Client([
                'base_uri' => $this->getServiceUrl()
            ]);

            return $client->request('GET', $path, array(
                    'query' => $query
                )
            );

        } catch (RequestException $zhce) {
            $message = 'Error in request to Web service: ' . $zhce->getMessage();
            throw new \Exception($message, $zhce->getCode());

        } catch (ClientException $zhce) {
            $message = 'Error in request to Web service: ' . $zhce->getMessage();
            throw new \Exception($message, $zhce->getCode());
        }

    }

    /**
     * @return string
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * @param string $apiKey
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @return string
     */
    public function getServiceUrl()
    {
        return $this->serviceUrl;
    }

    /**
     * @param string $serviceUrl
     */
    public function setServiceUrl($serviceUrl)
    {
        $this->serviceUrl = $serviceUrl;
    }


}