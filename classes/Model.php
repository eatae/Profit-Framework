<?php

abstract class Model
{

    public static function findAll(){
        $db = new Db();
        $data = $db->query('SELECT * FROM ' . static::TABLE, [], static::class);
        return $data;
    }

    public static function findById($id){
        $id = array(
            ':id' => $id
        );
        $db = new Db();
        $data = $db->query('SELECT * FROM ' . static::TABLE .
                                ' WHERE news_id = :id', $id, static::class);
        return $data;
    }

}