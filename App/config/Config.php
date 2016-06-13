<?php
namespace App\config;

class Config
{
    public $data;
    protected static $_instance = null;

    private function __construct()
    {
        $filePath = __DIR__.'/../../config.php';
        if (is_readable($filePath))
            $this->data = include $filePath;
    }

    public static function getInstance(){
        if (self::$_instance === null){
            self::$_instance = new self;
        }
        return self::$_instance;
    }
}
