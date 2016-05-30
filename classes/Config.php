<?php

class Config
{
    public $data;

    protected static $_instance = null;

    private function __construct()
    {
        $filePath = __DIR__.'/../config.php';
        if(file_exists($filePath))
            $this->data = include $filePath;
    }

    public static function getInstance(){
        if(self::$_instance === null){
            self::$_instance = new self;
        }
        return self::$_instance;
    }
}

$config = Config::getInstance();
echo $config->data['db']['host'];