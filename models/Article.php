<?php
require __DIR__ . '/../classes/Model.php';
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

    protected static $table = 'news';

    public static function getNews()
    {
        $db = new Db();
        $data = $db->query('SELECT * FROM ' . self::$table .'
                              ORDER BY id DESC LIMIT 4');

        return $data;
    }
}