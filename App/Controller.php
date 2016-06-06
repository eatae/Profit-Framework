<?php

namespace App;


abstract class Controller
{
    /**
     * @var View
     */
    protected $view;
    protected $access;

    abstract function actionDefault();


    public function __construct()
    {
        $this->view = new View();
    }


    public function action($action)
    {
        if(!true == $this->access()) {
            echo 'Доступ закрыт';
            return;
        }

        method_exists($this, $action) ? $this->$action() : $this->actionDefault();
    }


    public function access()
    {
        return true;
    }
}