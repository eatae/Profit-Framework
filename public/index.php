<?php
header('Content-type: text/html; charset=utf-8');
session_start();

require_once realpath(__DIR__ .'/../autoload.php');
require_once realpath(__DIR__ .'/../bootstrap/paths.php');
require_once realpath(__DIR__ .'/../bootstrap/functions.php');
require_once realpath(__DIR__ . '/../bootstrap/bootstrap.php');

/**** DEBUG ****/
//sd( realpath(bootstrapDir()) );

$rout = new App\Router($_SERVER['REQUEST_URI']);
// $rout->ctrlClass - controller name
$ctrl = new $rout->ctrlClass();
// $rout->actionMethodName - action name
$ctrl->action($rout->actionMethodName);

