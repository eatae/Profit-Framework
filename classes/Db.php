<?php
namespace classes;
header('Content-type: text/html; charset=utf-8');

/**
 * Class Db
 * @package classes
 */
class Db
{
    protected $db_hdr;


    public function __construct()
    {
        $this->db_hdr = new \PDO('mysql:host=127.0.0.1; dbname=profitphp2', 'root', '');
    }


    /**
     * @param $sql
     * @param array $params
     * @param string $class
     * @return array
     */
    public function query($sql, $params = [], $class='')
    {
        $st_hdr = $this->db_hdr->prepare($sql);
        $st_hdr->execute($params);
        if(empty($class))
            return $st_hdr->fetchAll();
        return $st_hdr->fetchAll(\PDO::FETCH_CLASS, $class);

    }


    /**
     * @param $sql
     * @param array $params
     * @return bool
     */
    public function execute($sql, $params=[])
    {
        $st_hdr = $this->db_hdr->prepare($sql);
        return $st_hdr->execute($params);
    }


    /**
     * @return string
     */
    public function insertId()
    {
        return $this->db_hdr->lastInsertId();
    }

}