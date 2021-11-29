<?php
namespace App\Models;

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

    public static function getFullName()
    {
        return [
            'id' => function($id){
                        return 'Id автора: ' . $id;
                    },
            'fullName' => function($firstname){
                            return function ($lastname) use ($firstname){
                                return 'ФИО: ' . $firstname . ' ' . $lastname;
                            };
                        }
        ];
    }

}