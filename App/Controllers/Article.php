<?php
namespace App\Controllers;

require __DIR__ . '/../../autoload.php';

use App;

class Article extends App\Controller
{
    public function actionDefault()
    {
        try {
            if (empty($_GET['id'])) {
                echo "<a href='/Index'>Выберите новость</a>";
                exit;
            }
            $article = App\models\Article::findByID($_GET['id']);
            $this->view->article = $article;
            $this->view->display(__DIR__ . '/../../templates/view_article.php');

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
