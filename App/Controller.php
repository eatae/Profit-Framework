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
        if(empty($this->accessFlag))
            return;
        $this->actionDefault();
        exit;
/*

        }elseif(!empty($_GET) and $this->access == $_GET){
            $this->actionDefault();
        }else{
            $onlyClass = explode('\\', strtolower(static::class));
            $onlyClass = array_pop($onlyClass);
            $this->view->display(__DIR__ .
                '/../templates/view_' .  $onlyClass . '_access.php');
            exit;
        }
*/
    }
}