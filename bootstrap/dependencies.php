<?php
use App\Db;
use Psr\Container\ContainerInterface;
use function DI\factory;

return [
    'PDO.mysql' => function (ContainerInterface $c) {
        return new PDO(
            "mysql:host={$_ENV['MYSQL_CONTAINER_HOST']}; dbname={$_ENV['MYSQL_DATABASE']}",
            $_ENV['MYSQL_USER'],
            $_ENV['MYSQL_PASSWORD']
        );
    },
    'db' => function (ContainerInterface $c) {
        return new Db($c->get('PDO.mysql'));
    }
];
