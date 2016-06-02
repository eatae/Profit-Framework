<?
require __DIR__ . '/autoload.php';

$articles = models\Article::findAll();
$view = new classes\View();

$view->news = $articles;
$view->display(__DIR__ . '/templates/view_index.php');
