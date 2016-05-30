<?
require __DIR__ . '/models/Article.php';

$data = Article::getNews();

include __DIR__ . '/view/view_index.php';


$insert = new Article;
//$insert->title = 'Необычная новость';
//$insert->lead = 'Белки любят морковь';
//$insert->insert();
echo $insert->id;