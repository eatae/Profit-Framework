<?php
namespace App\Controllers;

require __DIR__ . '/../../autoload.php';

use App;

class Index extends App\Controller
{
    public function actionDefault()
    {
        try {
            $articles = App\models\Article::findAll(true);

            //view инициализируем в Controller
            $this->view->news = $articles;
            $this->view->display(__DIR__ . '/../../templates/view_index.php');

        } catch (\PDOException $e) {
            $this->view->exception = $e->getMessage();
            $this->view->display(__DIR__ . '/../../templates/view_db_err.php');
        } catch (App\Exceptions\DbException $e) {
                $e->setLog();
                $this->view->exception = $e->getMessage();
                $this->view->display(__DIR__ . '/../../templates/view_db_err.php');
        } catch (App\Exceptions\NotFoundException $e) {
            $e->setLog();
            $this->view->exception = $e->getMessage();
            $this->view->display(__DIR__ . '/../../templates/view_404_err.php');
        }
    }
}
