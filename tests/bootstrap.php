<?php
namespace tests;
require_once realpath(__DIR__ .'/../autoload.php');
use Dotenv\Dotenv;

/**
 * Set $_ENV
 */
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();


/**
 * @return \PDO
 */
function getConnection(): \PDO
{
    static $connection;
    if (empty($connection)) {
        $connection = new \PDO("mysql:host={$_ENV['MYSQL_CONTAINER_HOST']}; dbname={$_ENV['MYSQL_TEST_DATABASE']}",
            $_ENV['MYSQL_TEST_USER'],
            $_ENV['MYSQL_TEST_PASSWORD']
        );
    }

    return $connection;
}

/**
 * @return string|null
 */
function testDbName(): ?string
{
    return $_ENV['MYSQL_TEST_DATABASE'];
}