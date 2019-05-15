# nerkh

Nerkh webservice by [apimaster](http://apimaster.ir/product/nerkh)

## Installation

Via Composer

``` bash
$ composer require apimaster/nerkh
```

## Usage

``` php
<?php

include 'vendor/autoload.php';

use APIMaster\Nerkh\Nerkh;

Nerkh::setApiKey('<YOUR_API_KEY');

$usd_sana = Nerkh::single('usd_sana');

print_r($usd_sana);
```

Replace `<YOUR_API_KEY>` with your given api key.

## Documentation

You can see documents in [postman](https://documenter.getpostman.com/view/3509100/RWgja2Ry). 
Don't forget to check out endpoint examples.

## License

This library is open-sourced package licensed under the MIT license.
