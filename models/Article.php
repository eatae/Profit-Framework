<?php

/*
 * класс описывает таблицу news
 * объект как отдельная запись db
 */
class Article extends Model
{
    /** свойства одноимённые столбцам в db */
    public $news_id;
    public $title;
    public $lead;

    const TABLE = 'news';

    public static function getNews()
    {
        $db = New Db();
        $data = $db->query('SELECT * FROM news
                              ORDER BY news_id DESC LIMIT 3');

        echo '<table>';
        foreach($data as $val){
            echo '<tr>';
                echo "<td><a href='article.php?id={$val['news_id']}'>Новость № {$val['news_id']}</a></td>";
                echo "<td>{$val['title']}</td>";
            echo '</tr>';
        }
        echo '</table>';
    }

    public static function getOneLead($article){
        echo "<h1>Вы читаете новость № $article->news_id</h1>";
        echo "<h2>Это - '$article->title'</h2>";
        echo "<h3>Сама статья:<br>$article->lead</h3>";
        echo "<a href='http://profitphp2.local/index.php'> Назад </a>";
    }

}