## USA Today API Client

## Introduction

This is Zend Framework module with API client to access USA Today bestsellers API

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
        'USAToday'
    )
);
```

Add your USA Today API credentials in `global.php`. Your `global.php` might look something like the following:

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

### Fetch booklists:
```php
php public/index.php usatoday fetch-booklists -v
```

### Fetch dates:
```php
php public/index.php usatoday fetch-dates -v
```

### Fetch categories:
```php
php public/index.php usatoday fetch-categories -v
```

## Links

* [ZF2 website](http://framework.zend.com)