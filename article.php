<?php
require __DIR__ . '/classes/Db.php';
require __DIR__ . '/classes/Model.php';
require __DIR__ . '/models/Article.php';

if(empty($_GET['id'])) {
    echo "<a href='http://profitphp2.local/index.php'>Выберете новость</a>";
    exit;
}

$article = Article::findById($_GET['id'])[0];
$article->getOneLead();




//echo "<h1>Вы читаете новость № $article->news_id</h1>";
//
//echo "<h2>Это - '$article->title'</h2>";
//
//echo "<p border='1'>Сама статья $article->lead</p>";



/* test */
//echo '<pre>';
//var_dump($article);
//var_dump($_SERVER);
//echo $article->news_id;