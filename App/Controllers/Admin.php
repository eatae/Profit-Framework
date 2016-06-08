<?php
namespace App\Controllers;

require __DIR__.'/../../autoload.php';

use App;
use App\models;

class Admin
    extends App\Controller
{
    public $article;
    protected $accessFlag;
    protected $access =
        [
            'login' => 'root',
            'pass' => '000'
        ];


    public function action($action)
    {
        $this->accessFlag = !$_SESSION['admin'];
        parent::action($action);
    }


    public function actionDefault()
    {
        if($_SERVER['REQUEST_METHOD'] == 'GET' and !$this->accessFlag) {
            $this->view->display
                (__DIR__ . '/../../templates/view_admin.php');
        }
        else if($_SERVER['REQUEST_METHOD'] == 'POST' and $this->access == $_POST){
            $_SESSION['admin'] = true;
            $this->view->display
                (__DIR__ . '/../../templates/view_admin.php');
        }
        else{
            $this->view->display
                (__DIR__ . '/../../templates/view_admin_access.php');
        }
    }


    public function actionMakeArticle()
    {
        if($this->accessFlag) {
            $this->view->display
            (__DIR__ . '/../../templates/view_admin_access.php');
            return;
        }
        include __DIR__ . '/../../check_forms.php';
    }

}




/*
protected function checkAccess()
{
    if(!$_SESSION['admin']) {
        $this->accessFlag = true;
        $this->view->display
        (__DIR__ . '/../../templates/view_admin_access.php');
        exit;
    }
    else{
        return;
    }
}
*/