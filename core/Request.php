<?php

class Request
{
    public static function uri()
    {
        return trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    }

    public static function id()
    {
        $uri = self::uri();
        $uriChunks = explode('/', $uri);

        return end($uriChunks);
    }

    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}
