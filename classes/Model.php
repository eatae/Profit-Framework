<?php
namespace classes;
require __DIR__ . '/../autoload.php';

use classes;

/**
 * @abstract Class Db
 * @package classes
 */
abstract class Model
{

    protected static $table;

    public $id;

    /**
     * @param int $limit
     * @return array
     */
    public static function findAll($limit = 5)
    {
        $sql = 'SELECT * FROM ' . static::$table .
                    ' ORDER BY id DESC LIMIT ' . $limit;

        $db = new classes\Db();
        $data = $db->query($sql, [], static::class);
        return $data;
    }


    /**
     * @param $id
     * @return mixed
     */
    public static function findById($id)
    {
        $db = new Db();
        $data = $db->query('SELECT * FROM ' . static::$table .
                                ' WHERE id = :id', [':id' => $id], static::class);
        return array_shift($data);
    }


    /* проверяем id (true / false)*/
    public function checkId($id)
    {
        $db = new Db();
        $sql = 'SELECT id FROM '. static::$table .' WHERE id = :id';
        return $db->execute($sql, [':id'=>$id]);
    }



    /** SAVE AND DELETE **/
    // ----------------

    public function delete()
    {
        if(empty($this->id) or $this->checkId($this->id))
            return false;

        $sql = 'DELETE FROM '. static::$table . ' WHERE id = :id';
        $db = new Db();
        return $db->execute($sql, [':id'=>$this->id]);
    }


    public function insert()
    {
        /* получаем все имена свойств объекта */
        $props = [];
        $binds = [];
        $params = [];

        foreach($this as $key => $val){
            if($key === 'id') continue;

            $props[] = $key;    //имена свойст / столбцов
            $binds[] = ':' . $key;  //для подстановки (:lead,..)
            $params[':' .$key] = $val;  //значения
        }

        $sql = 'INSERT INTO '. static::$table .
                ' ('. implode(', ', $props) .')
                  VALUES ('. implode(', ', $binds) .')';

        $db = new Db();
        //если запрос исполнился
        if($db->execute($sql, $params)) {
            $this->id = $db->insertId();
            return true;
        }
        //иначе
        return false;
    }


    public function update()
    {
        $set = [];
        $params = [];

        foreach($this as $key => $val){
            //получаем стр. set[1] => 'id = :id'
            $set[] = $key.'=:'.$key;
            $params[':'.$key] = $val;
        }

        $sql = 'UPDATE ' . static::$table .
                    ' SET ' . implode(', ', $set) .
                    ' WHERE id = '. $this->id;

        $db = new Db();
        return $db->execute($sql, $params);
    }


    public function save()
    {
        //пустой id или такого id нет
        if (empty($this->id) or $this->checkId($this->id)) {
            return $this->insert();

        } else {
            return $this->update();
        }
    }

}