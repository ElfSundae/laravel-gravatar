# Laravel Gravatar Helper

<img src="https://secure.gravatar.com/avatar/000000" style="float:right">

[![Latest Version on Packagist](https://img.shields.io/packagist/v/elfsundae/laravel-gravatar.svg?style=flat-square)](https://packagist.org/packages/elfsundae/laravel-gravatar)

The easiest way to generate [Gravatar](https://gravatar.com) avatar URL.

## Installation

```sh
$ composer require elfsundae/laravel-gravatar
```

## Usage

There is only one global helper function you may use:

```php
/**
 * Generate Gravatar URL for the given email address.
 *
 * @param  string  $email
 * @param  int|string|null  $size
 * @param  string|null  $default
 * @param  string|null  $rating
 * @return string
 */
gravatar($email, $size = null, $default = null, $rating = null)
```

Example:

```php
gravatar('foo@bar');
// "https://secure.gravatar.com/avatar/cca210311c3caf70e4a335aad6fa1047"

gravatar('foo@bar', 120, 'identicon', 'pg');
// "https://secure.gravatar.com/avatar/cca210311c3caf70e4a335aad6fa1047?size=120&default=identicon&rating=pg"
```

## Configuration

If you want to configure some default parameters for your application, copy [following content](config/services.php) to the config file `config/services.php` and custom as you want.

```php
    /*
    |--------------------------------------------------------------------------
    | Gravatar - Globally Recognized Avatars - https://gravatar.com
    |--------------------------------------------------------------------------
    |
    | All configuration value can be an empty string or null to use the
    | Gravatar default value.
    |
    | url      The root URL of Gravatar service.
    |            https://secure.gravatar.com/avatar         (Default)
    |            https://gravatar.cat.net/avatar            (China Mirror)
    |            https://v2ex.assets.uxengine.net/gravatar  (China Mirror)
    | size     The default avatar size in pixel, default is "80".
    | default  The default avatar image.
    |            404, mm, identicon, monsterid, wavatar, retro, blank, "http://image/url"
    | rating   The highest avatar rating, default is "g".
    |            g, pg, r, x
    |
    */

    'gravatar' => [
        'url' => '',
        'size' => '',
        'default' => '',
        'rating' => '',
    ],
```

## License

The MIT License.
