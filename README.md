## USA Today API Client

## Introduction

Laminas/Zend Framework module with API client to access USA Today BestSellers API

## Installation
Install the module using Composer into your application's vendor directory. Add the following line to your
`composer.json`.

```json
{
    "require": {
        "firelike/usatoday-api-client": "1.*"
    }
}
```
## Configuration

Enable the module in your `application.config.php` file.

```php
return array(
    'modules' => array(
        'Firelike\USAToday'
    )
);
```

Copy and paste the `usatoday.local.php.dist` file to your `config/autoload` folder and customize it with your credentials and
other configuration settings. Make sure to remove `.dist` from your file.Your `usatoday.local.php` might look something like the following:
```php
<?php
return [
    'usat_service' => [
        'service_url' => 'http://api.usatoday.com/open/bestsellers/books',
        'api_key' => '<your-usa-today-api-key>'
    ]
];
```



## Usage

Calling from your code:

```php
        use Firelike\USAToday\Service\BestSellersService;
        
        $service = new BestSellersService();
        
        $options = [
          'year' => '2016',
          'month' => '10',
          'date' => '20'
        ];
        $records = $service->booklists($options);
        
        var_dump($records);
        
```

Using the console:

```php
php public/index.php usatoday fetch-booklists -v
```
## Implemented Service Methods:

* **booklists**
* **dates**
* **categories**


## Links

* [Zend Framework website](http://framework.zend.com)
* [USA Today Developer Network](https://developer.usatoday.com/)