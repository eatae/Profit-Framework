<?php
require __DIR__ . '/classes/Db.php';
require __DIR__ . '/classes/Model.php';
require __DIR__ . '/models/Article.php';
//require __DIR__ . '/templates/article_templates.php';


if(empty($_GET['id'])) {
    echo "<a href='http://profitphp2.local/index.php'>Выберете новость</a>";
    exit;
}

$article = Article::findById($_GET['id'])[0];

if(!is_object($article)) {
    echo 'Такой записи не существует';
    exit;
}

echo "<h1>Вы читаете новость № $article->id</h1>";
echo "<h2>Это - $article->title</h2>";
echo "<h3>Сама статья:<br>$article->lead</h3>";
echo "<a href='http://profitphp2.local/index.php'> Назад </a>";