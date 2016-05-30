<?php
require __DIR__ . '/models/Article.php';

if(empty($_GET['id'])) {
    echo "<a href='http://profitphp2.local/index.php'>Выберете новость</a>";
    exit;
}

$article = Article::findById($_GET['id'])[0];

include __DIR__ . '/view/view_article.php';
