<?php
namespace App\Controllers;

require __DIR__.'/../../autoload.php';

use App;

use App\models;

use App\models\Author as Author;

class Admin extends App\Controller
{
    public $article;
    public $authorName;
    protected $accessFlag;
    protected $access =
        [
            'login' => 'root',
            'pass' => '000'
        ];


    public function action($action)
    {
        try {
            $this->accessFlag = !$_SESSION['admin'];
            parent::action($action);

        } catch (\PDOException $e) {
            $this->view->exception = "PDOException";
            $this->view->display(__DIR__ . '/../../templates/view_db_err.php');
            //здесь пишем в лог
        } catch (App\Exceptions\DbException $e) {
            $e->setLog();
            $this->view->exception = $e->getMessage();
            $this->view->display(__DIR__ . '/../../templates/view_db_err.php');
            //здесь пишем в лог
        } catch (App\Exceptions\NotFoundException $e) {
            $e->setLog();
            $this->view->exception = $e->getMessage();
            $this->view->display(__DIR__ . '/../../templates/view_404_err.php');
            //здесь пишем в лог
        }
    }


    public function actionDefault()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] == 'GET' and !$this->accessFlag) {
                $this->view->display
                (__DIR__ . '/../../templates/view_admin.php');
                $this->authorName = new App\AdminDataTable(Author::findAll(), Author::getFullName());
                $this->authorName->render();
            } else if ($_SERVER['REQUEST_METHOD'] == 'POST' and $this->access == $_POST) {
                $_SESSION['admin'] = true;
                $this->view->display
                (__DIR__ . '/../../templates/view_admin.php');
            } else {
                $this->view->display
                (__DIR__ . '/../../templates/view_admin_access.php');
            }

        } catch (\PDOException $e) {
            $this->view->exception = "PDOException";
            $this->view->display(__DIR__ . '/../../templates/view_db_err.php');
            //здесь пишем в лог
        } catch (App\Exceptions\DbException $e) {
            $e->setLog();
            $this->view->exception = $e->getMessage();
            $this->view->display(__DIR__ . '/../../templates/view_db_err.php');
            //здесь пишем в лог
        } catch (App\Exceptions\NotFoundException $e) {
            $e->setLog();
            $this->view->exception = $e->getMessage();
            $this->view->display(__DIR__ . '/../../templates/view_404_err.php');
            //здесь пишем в лог
        }
    }


    public function actionMakeArticle()
    {
        try {
            if($this->accessFlag) {
                $this->view->display
                (__DIR__ . '/../../templates/view_admin_access.php');
                return;
            }
            include __DIR__ . '/../../check_forms.php';

        } catch (\PDOException $e) {
            $this->view->exception = "PDOException";
            $this->view->display(__DIR__ . '/../../templates/view_db_err.php');
            //здесь пишем в лог
        } catch (App\Exceptions\DbException $e) {
            $e->setLog();
            $this->view->exception = $e->getMessage();
            $this->view->display(__DIR__ . '/../../templates/view_db_err.php');
            //здесь пишем в лог
        } catch (App\Exceptions\NotFoundException $e) {
            $e->setLog();
            $this->view->exception = $e->getMessage();
            $this->view->display(__DIR__ . '/../../templates/view_404_err.php');
            //здесь пишем в лог
        }
    }
}
