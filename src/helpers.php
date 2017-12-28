<?php

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

        $config = array_filter(config('gravatar.'.$connection, []));

        if ($size) {
            unset($config['s']);
            $config['size'] = $size;
        }

        $url = array_pull($config, 'url', 'https://secure.gravatar.com/avatar');
        $query = http_build_query($config);

        return $url.'/'.$hash.($query ? '?'.$query : '');
    }
}
