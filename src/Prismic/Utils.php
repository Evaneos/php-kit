<?php

namespace Prismic;

class Utils
{
    public static function buildUrl($baseUrl, array $parameters)
    {
        $sep = strpos($baseUrl, '?') !== false ? '&' : '?';
        $url = $baseUrl . $sep . http_build_query($parameters, '', '&', PHP_QUERY_RFC3986);
        /**
         * This expression removes integer array keys,
         * i.e. ?q[0]=Whatever&q[1]=OtherThing becomes ?q=Whatever&q=OtherThing
         */
        $url = preg_replace('/%5B(?:[0-9]|[1-9][0-9]+)%5D=/', '=', $url);
        return $url;
    }
}