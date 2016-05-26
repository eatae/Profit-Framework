<?
require __DIR__ . '/classes/Db.php';
require __DIR__ . '/classes/Model.php';
require __DIR__ . '/models/Article.php';


Article::getNews();




/* вызываем метод query и передаём:
        sql-строку, безымянный массив, название класса */
//$articles = Article::findAll();
//
//Article::st_class();
//
//var_dump($articles);