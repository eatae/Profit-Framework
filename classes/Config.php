<?php

class Config
{
    public $data;

    public function __construct()
    {
        $filePath = __DIR__.'/../config.php';
        if(file_exists($filePath))
            $this->data = include $filePath;
    }
}

$config = new Config;
echo $config->data['db']['host'];