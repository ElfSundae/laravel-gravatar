<?php

use Illuminate\Support\Arr;

if (! function_exists('gravatar')) {
    /**
     * Generate Gravatar avatar URL for the given email address.
     *
     * @param  string  $email
     * @param  string  $connection
     * @return string
     */
    function gravatar($email, $connection = 'default')
    {
        $config = array_filter(config("gravatar.$connection", []));
        $url = Arr::pull($config, 'url', 'https://secure.gravatar.com/avatar');
        $hash = strlen($email) == 32 && ctype_xdigit($email)
            ? $email : md5(strtolower(trim($email)));
        $query = http_build_query($config);

        return $url.'/'.$hash.($query ? '?'.$query : '');
    }
}
