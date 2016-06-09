<?php
namespace App\Controllers;

require __DIR__ . '/../../autoload.php';

use App;

class Index
    extends App\Controller
{
    public function actionDefault()
    {
        try {
            $articles = App\models\Article::findAll();

            //view инициализируем в Controller
            $this->view->news = $articles;
            $this->view->display(__DIR__ . '/../../templates/view_index.php');

        } catch (\PDOException $e) {
            $this->view->display(__DIR__ . '/../../templates/view_db_err.php');
            //здесь пишем в лог
        } catch (App\Exceptions\NotFoundException $e) {
            $this->view->display(__DIR__ . '/../../templates/view_404_err.php');
            //здесь пишем в лог
        }
    }
}