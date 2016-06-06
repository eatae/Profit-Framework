<?php
namespace App\Controllers;

require __DIR__ . '/../../autoload.php';

use App;

class Index
    extends App\Controller
{
    public function actionDefault()
    {
        $articles = App\models\Article::findAll();

        //view инициализируем в Controller
        $this->view->news = $articles;
        $this->view->display(__DIR__ . '/../../templates/view_index.php');
    }
}