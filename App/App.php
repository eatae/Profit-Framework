<?php

namespace App;

use DI\Container;

class App
{
    private Container $container;
    private static self $_instance;


    public function __construct(Container $container)
    {
        $this->container = $container;
        self::$_instance = $this;
    }


    public function getContainer(): Container
    {
        return $this->container;
    }

    public static function container(): Container
    {
        return self::$_instance->getContainer();
    }
}