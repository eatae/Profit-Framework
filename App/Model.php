<?php
namespace App;

use App\Exceptions\NotFoundException;
use DI\Container;


class Model
{

    protected static $table;

    public $id;

    public static function findAll($gen = '', $limit = 10)
    {
        $db = self::getDb();
        $sql = 'SELECT * FROM ' . static::$table .
                    ' ORDER BY id DESC LIMIT ' . $limit;

        if ($gen) {
            $data = $db->queryEach($sql, [], static::class);
        } else {
            $data = $db->query($sql, [], static::class);
        }
        if (!$data or empty($data)) {
            throw new NotFoundException('В данный момент товара нет findAll');
        } else {
            return $data;
        }
    }


    public static function findById($id)
    {
        $db = self::getDb();
        $data = $db->query('SELECT * FROM ' . static::$table .
                                ' WHERE id = :id', [':id' => $id], static::class);
        if (!$data or empty($data)) {
            throw new NotFoundException('Ошибка findById');
        } else {
            return array_shift($data);
        }
    }


    /* проверяем id (true / false)*/
    public function checkId($id)
    {
        $sql = 'SELECT id FROM '. static::$table .' WHERE id = :id';
        //db->query return - array | bool
        return (bool)$this->db->query($sql, [':id'=>$id]);
    }


    /** SAVE AND DELETE **/
    // ----------------


    public function delete()
    {
        $sql = 'DELETE FROM '. static::$table . ' WHERE id = :id';
        // проверяем Id
        if (!$this->checkId($this->id))
            throw new NotFoundException('Такого ID нет');

        $this->db->query($sql, [':id'=>$this->id]);
    }


    public function insert()
    {
        /* получаем все имена свойств объекта */
        $props = [];
        $binds = [];
        $params = [];

        foreach ($this as $key => $val) {
            if ($key === 'id') continue;

            $props[] = $key;    //имена свойств / столбцов
            $binds[] = ':' . $key;  //для подстановки (:lead,..)
            $params[':' .$key] = $val;  //значения
        }

        $sql = 'INSERT INTO '. static::$table .
                 '('. implode(', ', $props) .')
                  VALUES ('. implode(', ', $binds) .')';

        //проверили в class Db
        $this->db->execute($sql, $params);
        $this->id = $this->db->insertId();
    }


    public function update()
    {
        $set = [];
        $params = [];

        if (!$this->checkId($this->id))
            throw new NotFoundException('Неверно указан id');

        foreach ($this as $key => $val) {
            //получаем стр. set[0] => 'id = :id'
            $set[] = $key.'=:'.$key;
            $params[':'.$key] = $val;
        }

        $sql = 'UPDATE ' . static::$table .
                    ' SET ' . implode(', ', $set) .
                    ' WHERE id = '. $this->id;

        $this->db->execute($sql, $params);
    }


    public function save()
    {
        //пустой id или такого id нет
        if (empty($this->id) or !$this->checkId($this->id)) {
            $this->insert();
        } else {
            $this->update();
        }
    }


    public static function getDb(): Db
    {
        return (App::container())->get('db');
    }

}
