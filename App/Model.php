<?php
namespace App;
use App\Exceptions\NotFoundException;

require __DIR__ . '/../autoload.php';



abstract class Model
{

    protected static $table;

    public $id;


    public static function findAll($limit = 5)
    {
        $sql = 'SELECT * FROM ' . static::$table .
                    ' ORDER BY id DESC LIMIT ' . $limit;

        $db = new Db();
        $data = $db->query($sql, [], static::class);
        if(!$data or empty($data)){
            throw new NotFoundException('Ошибка findAll');
        }else {
            return $data;
        }
    }


    public static function findById($id)
    {
        $db = new Db();
        $data = $db->query('SELECT * FROM ' . static::$table .
                                ' WHERE id = :id', [':id' => $id], static::class);
        if(!$data or empty($data)){
            throw new NotFoundException('Ошибка findById');
        }else { return array_shift($data); }
    }


    /* проверяем id (true / false)*/
    public function checkId($id)
    {
        $db = new Db();
        $sql = 'SELECT id FROM '. static::$table .' WHERE id = :id';

        if(!$db->execute($sql, [':id'=>$id]))
            throw new NotFoundException('checkId');
        return true;
    }


    /** SAVE AND DELETE **/
    // ----------------
    public function delete()
    {
//        if(empty($this->id) or !$this->checkId($this->id))
//            return false;

        $sql = 'DELETE FROM '. static::$table . ' WHERE id = :id';
        $db = new Db();
        if(!$db->execute($sql, [':id'=>$this->id])) {
            throw new NotFoundException('Ошибка findById');
        }
        return true;
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
                 '('. implode(', ', $props) .')
                  VALUES ('. implode(', ', $binds) .')';

        $db = new Db();
        //если запрос исполнился
        if($db->execute($sql, $params)) {
            $this->id = $db->insertId();
        }else { throw new NotFoundException('Ошибка insert'); }
    }


    public function update()
    {
        $set = [];
        $params = [];

        foreach($this as $key => $val){
            //получаем стр. set[0] => 'id = :id'
            $set[] = $key.'=:'.$key;
            $params[':'.$key] = $val;
        }

        $sql = 'UPDATE ' . static::$table .
                    ' SET ' . implode(', ', $set) .
                    ' WHERE id = '. $this->id;

        $db = new Db();
        if(!$db->execute($sql, $params)) {
            throw new NotFoundException('Ошибка insert');
        }
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

}