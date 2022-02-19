# Laravel Gravatar Helper

<img align="right" src="https://secure.gravatar.com/avatar/00000000000000000000000000000000">

[![Latest Version on Packagist](https://img.shields.io/packagist/v/elfsundae/laravel-gravatar.svg?style=flat-square)](https://packagist.org/packages/elfsundae/laravel-gravatar)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![tests](https://github.com/ElfSundae/laravel-gravatar/actions/workflows/tests.yml/badge.svg)](https://github.com/ElfSundae/laravel-gravatar/actions/workflows/tests.yml)
[![SymfonyInsight Grade](https://img.shields.io/symfony/i/grade/6e213f0f-e618-4ba5-b252-2575d18f21a9?style=flat-square)](https://insight.symfony.com/projects/6e213f0f-e618-4ba5-b252-2575d18f21a9)
[![Quality Score](https://img.shields.io/scrutinizer/g/ElfSundae/laravel-gravatar.svg?style=flat-square)](https://scrutinizer-ci.com/g/ElfSundae/laravel-gravatar)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/ElfSundae/laravel-gravatar/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/ElfSundae/laravel-gravatar/?branch=master)
[![Total Downloads](https://img.shields.io/packagist/dt/elfsundae/laravel-gravatar.svg?style=flat-square)](https://packagist.org/packages/elfsundae/laravel-gravatar)

The easiest way to generate [Gravatar](https://gravatar.com) avatar URL, with multiple connections support.

## Installation

You can install this package using the [Composer](https://getcomposer.org) manager:

```sh
$ composer require elfsundae/laravel-gravatar
```

Then copy the [configuration file](config/gravatar.php) to your application:

```sh
$ cp vendor/elfsundae/laravel-gravatar/config/gravatar.php config/gravatar.php
```

For Lumen, you need to load the configuration file in your `bootstrap/app.php` :

```php
$app->configure('gravatar');
```

## API

[`gravatar()`](src/helpers.php) is a global helper function you can use anywhere.

```php
/**
 * Generate Gravatar avatar URL for the given email address.
 *
 * @param  string      $email       Email or email hash
 * @param  string|int  $connection  Connection name or image size
 * @param  string|int  $size        Connection name or image size
 * @return string
 */
function gravatar($email, $connection = 'default', $size = null)
```

## Usage

```php
// For an email address, using the "default" connection configuration
gravatar('foo@example.com');

// For an email MD5 hash, using the "default" connection configuration
gravatar('b48def645758b95537d4424c84d1a9ff');

// Using the "large" connection
gravatar($email, 'large');

// Using the "default" connection, and overriding "size" parameter to 100
gravatar($email, 100);

// Using the "avatar" connection, and overriding "size" parameter to 100
gravatar($email, 'avatar', 100);
gravatar($email, 100, 'avatar');
```
