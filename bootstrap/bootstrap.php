<?php
use Dotenv\Dotenv;
use DI\ContainerBuilder;
use App\App;

/**
 * Set $_ENV
 */
$dotenv = Dotenv::createImmutable(coreDir());
$dotenv->load();

/**
 * DI container
 */
$builder = new ContainerBuilder();
// disable auto generation classes
$builder->useAutowiring(false);
// disable notation generation classes
$builder->useAnnotations(false);

// add definitions
$builder->addDefinitions(
    require realpath(__DIR__ .'/dependencies.php')
);

$container = $builder->build();

App::setContainer($container);