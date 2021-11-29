<?php

if (!function_exists('sd')) {
    /**
     * @param ...$params
     */
    function sd(...$params)
    {
        foreach ($params as $param) {
            var_dump($param);
        }
        exit();
    }
}

if (!function_exists('s')) {
    /**
     * @param ...$params
     */
    function s(...$params)
    {
        foreach ($params as $param) {
            var_dump($param);
        }
    }
}

