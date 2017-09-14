<?php

if (! function_exists('gravatar')) {
    /**
     * Generate Gravatar URL for the given email address.
     *
     * @param  string  $email
     * @param  int|string|null  $size
     * @param  string|null  $default
     * @param  string|null  $rating
     * @return string
     */
    function gravatar($email, $size = null, $default = null, $rating = null)
    {
        foreach ($parameters = ['size', 'default', 'rating'] as $param) {
            if (is_null($$param)) {
                $$param = config('services.gravatar.'.$param);
            }
        }

        $query = http_build_query(array_filter(compact($parameters)));

        $url = config('services.gravatar.url');
        $url = empty($url) ? 'https://secure.gravatar.com/avatar' : rtrim($url, '/');

        return $url.'/'.md5(strtolower(trim($email))).(empty($query) ? '' : '?').$query;
    }
}
