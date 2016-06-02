<?php
namespace models;

use classes;

/**
 * Class Author
 * @package models
 *
 * Класс описывает таблицу authors,
 * объект как отдельная запись db.
 */
class Author extends classes\Model
{
    public $id;
    public $firstname;
    public $lastname;

    protected static $table = 'authors';

}