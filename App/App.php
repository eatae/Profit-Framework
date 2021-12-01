<?php

namespace App;

use DI\Container;

class App
{
    protected static Container $container;

    public static function setContainer(Container $container)
    {
        self::$container = $container;
    }

    public static function getContainer(): ?Container
    {
        return self::$container;
    }
}