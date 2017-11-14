# Laravel Gravatar Helper

<img align="right" src="https://secure.gravatar.com/avatar/00000000000000000000000000000000">

[![Latest Version on Packagist](https://img.shields.io/packagist/v/elfsundae/laravel-gravatar.svg?style=flat-square)](https://packagist.org/packages/elfsundae/laravel-gravatar)
[![Build Status](https://img.shields.io/travis/ElfSundae/laravel-gravatar/master.svg?style=flat-square)](https://travis-ci.org/ElfSundae/laravel-gravatar)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)

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

For Lumen, you need to load the configuration file in `bootstrap/app.php` :

```php
$app->configure('gravatar');
```

## API

[`gravatar()`](src/helpers.php) is a global helper function you can use anywhere.

```php
/**
 * Generate Gravatar avatar URL for the given email address.
 *
 * @param  string  $email
 * @param  string  $connection
 * @return string
 */
gravatar($email, $connection = 'default')
```
