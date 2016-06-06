<?php
namespace App\models;

use App;

/**
 * Class Author
 * @package models
 *
 * Класс описывает таблицу authors,
 * объект как отдельная запись db.
 */
class Author extends App\Model
{
    public $id;
    public $firstname;
    public $lastname;

    protected static $table = 'authors';

}