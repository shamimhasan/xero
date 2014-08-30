# Xero Service Provider for Laravel 4

Originally forked from https://github.com/Softlabs/xero-laravel

A simple [Laravel 4](http://laravel.com) service provider for including the [PHP Xero API](https://github.com/XeroAPI/PHP-Xero).

## Installation

The Xero Service Provider can be installed via [Composer](http://getcomposer.org) by requiring the `Venturecraft/xero-laravel` package and setting the `minimum-stability` to `dev` in your project's `composer.json`.

```json
{
	"require": {
		"laravel/framework": "4.0.*",
		"venturecraft/xero-laravel": "dev-master"
	},
	"minimum-stability": "dev"
}
```

## Usage

To use the Xero Service Provider, you must register the provider when bootstrapping your Laravel application.

### Use Laravel Configuration

Create a new `app/config/xero.php` configuration file with the following options:

```php
return array(
    'key'           => '<your-xero-key>',
    'secret'        => '<your-xero-secret>',
    'publicPath'    => '../app/config/xero/publickey.cer',
    'privatePath'   => '../app/config/xero/privatekey.pem'
);
```

Find the `providers` key in `app/config/app.php` and register the Xero Service Provider.

```php
    'providers' => array(
        // ...
        'Venturecraft\XeroLaravel\XeroLaravelServiceProvider',
    )
```

Find the `aliases` key in `app/config/app.php` and add in our `Xero` alias.

```php
    'aliases' => array(
        // ...
        'XeroLaravel' 	  => 'Venturecraft\XeroLaravel\Facades\XeroLaravel',
    )
```

### Setting up the application

Create public and private keys, and save them in /app/config/xero/ as publickey.cer and privatekey.pem.

For more info on setting up your keys, check out the [Xero documentation](http://developer.xero.com/documentation/advanced-docs/public-private-keypair/)

## Example Usage

```
$contact = array(
    array(
       	"Name"        => $user['company']['name'],
       	"FirstName"   => $user['firstname'],
		"LastName"    => $user['surname'],
	)
);

$xero_contact = XeroLaravel::Contacts($contact);
```

## Reference

* [PHP Xero API](https://github.com/XeroAPI/PHP-Xero)
* [Laravel website](http://laravel.com)
