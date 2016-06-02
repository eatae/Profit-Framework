<?php
require __DIR__ . '/autoload.php';

if(empty($_GET['id'])) {
    echo "<a href='http://profitphp2.local/index.php'>Выберете новость</a>";
    exit;
}

$article = models\Article::findById($_GET['id']);

$view = new classes\View();
$view->article = $article;
$view->display(__DIR__ . '/templates/view_article.php');
