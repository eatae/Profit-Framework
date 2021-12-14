<?php
namespace App;

use App\Exceptions\DbException;
use PDO;

class Db
{
    protected PDO $connection;

    /**
     * @param PDO $connection
     */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @param $sql
     * @param array $params
     * @param string $class
     * @return array|false
     * @throws DbException
     */
    public function query($sql, $params = [], $class='')
    {
        $st_hdr = $this->connection->prepare($sql);
        if (!$st_hdr->execute($params)) {
            throw new DbException('Ошибка запроса');
        }
        if (empty($class)) {
            return $st_hdr->fetchAll();
        }

        return $st_hdr->fetchAll(\PDO::FETCH_CLASS, $class);
    }

    /**
     * @param $sql
     * @param array $params
     * @param string $class
     * @return \Generator
     * @throws DbException
     */
    public function queryEach($sql, $params=[], $class=''): \Generator
    {
        $st_hdr = $this->connection->prepare($sql);
        // задаём объект для выборки
        $st_hdr->setFetchMode(\PDO::FETCH_CLASS, $class);
        if (!$st_hdr->execute($params)) {
            throw new DbException('Ошибка запроса');
        }
        while ($data = $st_hdr->fetch()) {
            yield $data;
        }
    }

    /**
     * @param $sql
     * @param array $params
     * @throws DbException
     */
    public function execute($sql, $params=[])
    {
        $st_hdr = $this->connection->prepare($sql);
        if (!$st_hdr->execute($params)) {
            throw new DbException('Ошибка запроса');
        }
    }

    /**
     * @return string
     * @throws DbException
     */
    public function lastInsertId(): string
    {
        $id = $this->connection->lastInsertId();
        if (!$id) {
            throw new DbException('Ошибка запроса id');
        }
        return $id;
    }

}
