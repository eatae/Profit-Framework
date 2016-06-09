<?php
namespace App\Controllers;

require __DIR__ . '/../../autoload.php';

use App;

class Article
    extends App\Controller
{
    public function actionDefault()
    {
        try {
            if (empty($_GET['id'])) {
                echo "<a href='http://profitphp2.local/index.php'>Выберите новость</a>";
                exit;
            }
            $article = App\models\Article::findByID($_GET['id']);
            $this->view->article = $article;
            $this->view->display(__DIR__ . '/../../templates/view_article.php');
        }catch(\PDOException $e){
            $this->view->display(__DIR__ . '/../../templates/view_db_err.php');
            //здесь пишем в лог
        }catch(App\Exceptions\NotFoundException $e){
            $this->view->display(__DIR__ . '/../../templates/view_404_err.php');
            //здесь пишем в лог
        }
    }
}