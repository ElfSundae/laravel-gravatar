<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Gravatar - Globally Recognized Avatars - https://gravatar.com
    |--------------------------------------------------------------------------
    |
    | Every configuration value can be an empty string or null to use the
    | Gravatar default value.
    |
    | Possible Keys:
    |
    | url           Root URL of Gravatar service:
    |                   https://secure.gravatar.com/avatar         (Default)
    |                   https://gravatar.cat.net/avatar            (China Mirror)
    |                   https://v2ex.assets.uxengine.net/gravatar  (China Mirror)
    | extension     File-type extension: jpg, png, etc.
    | size / s      Avatar size in pixel, default is 80.
    | default / d   The default avatar image:
    |                   404, mm, identicon, monsterid, wavatar, retro,
    |                   robohash, blank, urlencode("http://image/url")
    | rating / r    The highest avatar rating, default is "g": g, pg, r, x.
    | forcedefault / f  If for some reason you wanted to force the default image
    |                   to always load, set this value to "y".
    |
    */

    'gravatar' => [

        'default' => [
            'size' => 120,
        ],

        'small' => [
            's' => 40,
        ],

        'large' => [
            's' => 640,
        ],

    ],

];
