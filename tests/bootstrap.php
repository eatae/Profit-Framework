<?php
namespace tests;
require_once realpath(__DIR__ .'/../autoload.php');
use Dotenv\Dotenv;

/**
 * Set $_ENV
 */
$dotenv = Dotenv::createImmutable(coreDir());
$dotenv->load();

/**
 * @return \PDO
 */
function getPdo(): \PDO
{
    return new \PDO("mysql:host={$_ENV['MYSQL_CONTAINER_HOST']}; dbname={$_ENV['MYSQL_TEST_DATABASE']}",
        $_ENV['MYSQL_USER'],
        $_ENV['MYSQL_PASSWORD']
    );
}