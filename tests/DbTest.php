<?php

namespace tests;

use PHPUnit\Framework\TestCase;
use App\Db;


class DbTest extends TestCase
{
    protected Db $db;
    protected static string $table = 'db_test';


    public static function setUpBeforeClass(): void
    {
        self::createTableIfNotExists();
    }

    public function setUp(): void
    {
        $this->db = new Db( getConnection() );
        $this->initialDataSet();
    }

    protected function tearDown(): void
    {
        $this->truncateTable();
    }


    // Tests

    public function testFoo()
    {
        dump('foo');
    }


    // Methods

    /**
     * Create table
     */
    protected static function createTableIfNotExists(): void
    {
        $sql = "CREATE TABLE IF NOT EXISTS ".self::$table." (
                    first_name VARCHAR(50) NOT NULL,
                    last_name VARCHAR(50) NOT NULL
                )";
        try {
            getConnection()->exec($sql);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Truncate table
     */
    protected function truncateTable(): void
    {
        getConnection()->exec("TRUNCATE TABLE ".self::$table);
    }

    /**
     * Set table data for each test (setUp)
     */
    protected function initialDataSet(): void
    {
        $fields = '';
        $values = '';
        for ($cnt = 0, $data = $this->initialData(); $cnt < count($data); $cnt++) {
            if ($cnt == 0) {
                $fields = implode(', ', array_keys($data[0]));
            }
            $values .= "('" .implode("', '", $data[$cnt]). "'),";
        }
        $values = substr($values, 0, -1);

        $sql = "INSERT INTO ".self::$table." ($fields) 
                    VALUES $values";

        getConnection()->exec($sql);
    }

    /**
     * @return \string[][]
     */
    protected function initialData(): array
    {
        return [
            ['first_name' => 'John', 'last_name' => 'Connor'],
            ['first_name' => 'Alice', 'last_name' => 'Selezneva']
        ];
    }

}