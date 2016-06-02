<?php
namespace models;
require __DIR__ . '/../autoload.php';

use classes;

/**
 * Class Article
 * @package models
 *
 * Класс описывает таблицу news,
 * объект как отдельная запись db.
 *
 * @property-read object $author
 * @property-read string $authorName
 */

class Article extends classes\Model
{
    /* свойства одноимённые столбцам в db */
    public $id;
    public $title;
    public $lead;
    public $author_id;

    protected static $table = 'news';

    protected $author;
    protected $authorName;

    /**
     * @param $key
     * @return bool|mixed|string
     */
    public function __get($key)
    {
        if(null == $this->id)
            return false;

        $article_obj = parent::findById($this->id);

        //если в объекте null и в базе null возвращаем false
        if(!null == $this->author_id){
            $author = Author::findById($this->author_id);
        }elseif(!null == $article_obj->author_id){
            $author = Author::findById($article_obj->author_id);
        }else{
            return false;
        }

        $name = $author->firstname.' '.$author->lastname;
        return ($key === 'author') ? $author : $name;
    }
}