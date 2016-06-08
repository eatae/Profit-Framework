<?php
namespace App\models;
require __DIR__ . '/../../autoload.php';

use App;


class Article extends App\Model
{
    /* свойства одноимённые столбцам в db */
    public $id;
    public $title;
    public $lead;
    public $author_id;

    protected static $table = 'news';

    private $author;
    private $authorName;

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