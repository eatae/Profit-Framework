<?php
namespace App\Controllers;

require __DIR__.'/../../autoload.php';

use App;

class Admin
    extends App\Controller
{

    protected $accessFlag = true;
    protected $access =
        [
            'login' => 'root',
            'pass' => '000'
        ];


    protected function checkAccess()
    {
        if(!$_SESSION['admin']) {
            $this->accessFlag = 'true';
            $this->view->display
            (__DIR__ . '/../../templates/view_admin_access.php');
            exit;
        }
        else{
            return;
        }
    }


    public function actionDefault()
    {
        if($_SESSION['admin']) {
            $this->view->display
                (__DIR__ . '/../../templates/view_admin.php');
        }
        else if($_SERVER['REQUEST_METHOD'] == 'POST' and $this->access == $_POST){
            $this->accessFlag = '';
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
        $this->checkAccess();

        include __DIR__ . '/../../check_forms.php';
    }

}