<?php
spl_autoload_register(
    function($class) {
        $fileName = __DIR__ . '/' . str_replace('\\', '/', $class) . php;

        if (file_exists($fileNAme))
            require $fileName;
    }
);
