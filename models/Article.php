<?php

/*
 * класс описывает таблицу news
 * объект как отдельная запись db
 */
class Article extends Model
{
    /** свойства одноимённые столбцам в db */
    public $id;
    public $title;
    public $lead;

    const TABLE = 'news';

    public static function getNews()
    {
        $db = New Db();
        $data = $db->query('SELECT * FROM news
                              ORDER BY id DESC LIMIT 4');

        return $data;
    }
}