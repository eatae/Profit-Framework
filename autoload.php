<?php

spl_autoload_register( function ($class){
        $class = trim($class, '\\');
        $class = str_replace('\\', '/', $class);

        require __DIR__ . '/' . $class . '.php';
});