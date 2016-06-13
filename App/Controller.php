<?php

namespace App;


abstract class Controller
{
    protected $view;
    protected $access;
    protected $accessFlag = '';

    abstract function actionDefault();


    public function __construct()
    {
        $this->view = new View();
    }


    public function action($action)
    {
        $this->access();
        method_exists($this, $action) ? $this->$action() : $this->actionDefault();
    }


    protected function access()
    {
        if ($this->accessFlag) {
            $this->actionDefault();
            exit;
        } else {
            return;
        }
    }
}
