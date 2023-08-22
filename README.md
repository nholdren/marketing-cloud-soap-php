SFMC-PHP-SOAP  
========

# Overview

This package is an updated version of the classic PHP helper library developed for the ExactTarget SOAP API. Updates include the addition of newer objects that have since been added to the the API and the support for using an OAuth token for authentication. 

Examples using the legacy library from ExactTarget can be found here: https://developer.salesforce.com/docs/marketing/marketing-cloud/guide/php_code_samples.html. 

Note: Almost all the PHP examples from Salesforce have misspellings in their class names like so "Marketing Cloud_SoapClient(" with a space between "Marketing" and "Cloud". 

# Installation  

### Packagist

Add the package to your composer.json

```
{
    "require": {
           "nholdren/marketing-cloud-php-soap": "dev-master"
    }
}
```

Next run a composer update

```
$ php composer.phar update nholdren/marketing-cloud-php-soap
```

or 

```
$ composer update nholdren/marketing-cloud-php-soap
```

# Usage

```php

$wsdl = 'https:/YOUR-TENANT-ID.soap.marketingcloudapis.com/etframework.wsdl';

$client = new ExactTargetSoapClient($wsdl, array('trace'=>1));

//Set username and password if still using this auth
$client->username = 'YOUR_USERNAME';
$client->password = 'YOUR_PASSWORD';

//Or pass your auth token instead 
$client->username = '*';
$client->password = '*';
$client->authtoken = 'YOUR-AUTH-TOKEN';        
        
```