<?php
namespace App\Controllers;

require __DIR__ . '/../../autoload.php';

use App;

class Article
    extends App\Controller
{
    public function actionDefault()
    {
        if(empty($_GET['id'])) {
            echo "<a href='http://profitphp2.local/index.php'>Выберите новость</a>";
            exit;
        }
        $article = App\models\Article::findByID($_GET['id']);
        $this->view->article = $article;
        $this->view->display(__DIR__ . '/../../templates/view_article.php');
    }
}