<?php
require __DIR__ . '/../classes/Db.php';

$db = new Db;

/* Название таблицы
*  нельзя передавать
*  в качестве statement
*  (используем const) */


function insertNews()
{
    global $db;
    $sql = "INSERT INTO news (title, lead)
              VALUES('Восьмая новость', 'Очень интересная новость')";
    var_dump($db->execute($sql));
}


function updateNews()
{
    global $db;
    $sql = "UPDATE news
              SET title = :title,
              lead = :lead
                ORDER BY news_id DESC LIMIT 1";
    $param = array(
        ':title' => 'Обновлённая новость',
        ':lead' => 'Очень обновленная новость'
    );

    var_dump($db->execute($sql, $param));
}


//updateNews();
//insertNews();

