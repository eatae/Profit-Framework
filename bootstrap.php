<?php
use Dotenv\Dotenv;
use DI\ContainerBuilder;

function coreDir() {
    return realpath(__DIR__ );
}

function publicDir() {
    return realpath(__DIR__ . DIRECTORY_SEPARATOR . 'public');
}

// Set $_ENV
$dotenv = Dotenv::createImmutable(coreDir());
$dotenv->load();

// DI
$builder = new \DI\ContainerBuilder();
$builder->useAutowiring(false);
$builder->useAnnotations(false);

$container = $builder->build();

$container->
