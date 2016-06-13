<?php
spl_autoload_register(
    function($class)
    {
        $class = trim($class, '\\');
        $class = str_replace('\\', '/', $class);
        $file = __DIR__ . '/' . $class . '.php';
        if (file_exists($file))
            require $file;
    }
);
require __DIR__ . '/vendor/autoload.php';
