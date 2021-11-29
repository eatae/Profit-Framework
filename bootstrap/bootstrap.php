<?php
use Dotenv\Dotenv;
use DI\ContainerBuilder;

require_once realpath(__DIR__ . DIRECTORY_SEPARATOR . 'paths.php');
require_once realpath(__DIR__ . DIRECTORY_SEPARATOR . 'functions.php');


/**
 * Set $_ENV
 */
$dotenv = Dotenv::createImmutable(coreDir());
$dotenv->load();

/**
 * DI container
 */
//$builder = new ContainerBuilder();
//// disable auto generation classes
//$builder->useAutowiring(false);
//// disable notation generation classes
//$builder->useAnnotations(false);
//
//// add definitions
//$builder->addDefinitions([
//    require realpath(__DIR__ . DIRECTORY_SEPARATOR . 'dependencies.php')
//]);
//
//$container = $builder->build();
