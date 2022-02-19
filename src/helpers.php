<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;

if (! function_exists('gravatar')) {
    /**
     * Generate Gravatar avatar URL for the given email address.
     *
     * @param  string      $email       Email or email hash
     * @param  string|int  $connection  Connection name or image size
     * @param  string|int  $size        Connection name or image size
     * @return string
     */
    function gravatar($email, $connection = 'default', $size = null)
    {
        $hash = strlen($email) == 32 && ctype_xdigit($email)
            ? strtolower($email)
            : md5(strtolower(trim($email)));

        if (is_int($connection)) {
            list($connection, $size) = [
                is_string($size) ? $size : 'default', $connection,
            ];
        }

        $config = ($repository = Config::getFacadeRoot())
            ? array_filter($repository->get('gravatar.'.$connection, []))
            : [];

        if ($size) {
            unset($config['s']);
            $config['size'] = $size;
        }

        $url = Arr::pull($config, 'url', 'https://secure.gravatar.com/avatar');
        $query = http_build_query($config, null, '&', PHP_QUERY_RFC3986);

        return $url.'/'.$hash.($query ? '?'.$query : '');
    }
}
