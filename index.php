<?
require __DIR__ . '/classes/Db.php';
require __DIR__ . '/classes/Model.php';
require __DIR__ . '/models/Article.php';


$data = Article::getNews();

echo '<table>';
foreach($data as $val){
    echo '<tr>';
        echo "<td><a href='article.php?id={$val['id']}'>Новость № {$val['id']}</a></td>";
        echo "<td>{$val['title']}</td>";
    echo '</tr>';
}
echo '</table>';