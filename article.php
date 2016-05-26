<?php
require __DIR__ . '/classes/Db.php';
require __DIR__ . '/classes/Model.php';
require __DIR__ . '/models/Article.php';

if(empty($_GET['id'])) {
    echo "<a href='http://profitphp2.local/index.php'>Выберете новость</a>";
    exit;
}

$article = Article::findById($_GET['id'])[0];

Article::getOneLead($article);