<?php

namespace App;

class Router
{
    public $ctrlClass;
    public $actionMethodName;

    public function __construct($uri)
    {
        $parts = explode('/', $uri);
        //controller name
        $ctrl = $parts[1] ?: 'Index';
        //action name
        $action = $parts[2] ?: 'action';
        $this->ctrlClass = 'App\Controllers\\' . ucfirst($ctrl);
        $this->actionMethodName = 'action' . ucfirst($action);

        if (!$this->checkDir($this->ctrlClass)) {
            $this->ctrlClass = '\App\Controllers\Index';
        }
    }


    public function checkDir($dir)
    {
        $dir = trim($dir, '\\');
        $dir = str_replace('\\', '/', $dir);
        if (!is_readable(__DIR__ . '/../' . $dir . '.php')) {
            return false;
        }
        return true;
    }
}
