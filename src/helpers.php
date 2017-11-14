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
        $query = http_build_query($config);

        return $url.'/'.md5(strtolower(trim($email))).($query ? "?$query" : '');
    }
}
