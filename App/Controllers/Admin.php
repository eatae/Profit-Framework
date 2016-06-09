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
        try
        {
            $this->accessFlag = !$_SESSION['admin'];
            parent::action($action);
        }
        catch(\PDOException $e) {
            $this->view->display(__DIR__ . '/../../templates/view_db_err.php');
            //здесь пишем в лог
        }
        catch(App\Exceptions\NotFoundException $e){
            $this->view->display(__DIR__ . '/../../templates/view_db_err.php');
            //здесь пишем в лог
        }
    }


    public function actionDefault()
    {
        try
        {
            if ($_SERVER['REQUEST_METHOD'] == 'GET' and !$this->accessFlag) {
                $this->view->display
                (__DIR__ . '/../../templates/view_admin.php');
            } else if ($_SERVER['REQUEST_METHOD'] == 'POST' and $this->access == $_POST) {
                $_SESSION['admin'] = true;
                $this->view->display
                (__DIR__ . '/../../templates/view_admin.php');
            } else {
                $this->view->display
                (__DIR__ . '/../../templates/view_admin_access.php');
            }
        }
        catch(\PDOException $e) {
            $this->view->display(__DIR__ . '/../../templates/view_db_err.php');
            //здесь пишем в лог
            exit;
        }
        catch(App\Exceptions\NotFoundException $e){
            $this->view->display(__DIR__ . '/../../templates/view_db_err.php');
            //здесь пишем в лог
            exit;
        }
    }


    public function actionMakeArticle()
    {
        try
        {
            if($this->accessFlag) {
                $this->view->display
                (__DIR__ . '/../../templates/view_admin_access.php');
                return;
            }
            include __DIR__ . '/../../check_forms.php';
        }
        catch(\PDOException $e) {
            $this->view->display(__DIR__ . '/../../templates/view_db_err.php');
            //здесь пишем в лог
        }
        catch(App\Exceptions\NotFoundException $e){
            $this->view->display(__DIR__ . '/../../templates/view_db_err.php');
            //здесь пишем в лог
        }

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