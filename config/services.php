<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Gravatar - Globally Recognized Avatars - https://gravatar.com
    |--------------------------------------------------------------------------
    |
    | url      The root URL of Gravatar service.
    |            https://secure.gravatar.com/avatar         (Default)
    |            https://gravatar.cat.net/avatar            (China Mirror)
    |            https://v2ex.assets.uxengine.net/gravatar  (China Mirror)
    | size     The default avatar size in pixel.
    | default  The default avatar image.
    |            404, mm, identicon, monsterid, wavatar, retro, blank
    | rating   The highest avatar rating.
    |            g, pg, r, x
    |
    */

    'gravatar' => [
        'url' => '',
        'size' => '80',
        'default' => 'identicon',
        'rating' => 'pg',
    ],

];
