<?php

if (!function_exists('coreDir')) {
    /**
     * @return false|string
     */
    function coreDir()
    {
        return realpath(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR);
    }
}

if (!function_exists('publicDir')) {
    /**
     * @return false|string
     */
    function publicDir() {
        return realpath(coreDir() . DIRECTORY_SEPARATOR . 'public');
    }
}

if (!function_exists('bootstrapDir')) {
    /**
     * @return false|string
     */
    function bootstrapDir() {
        return realpath(coreDir() . DIRECTORY_SEPARATOR . 'bootstrap');
    }
}

