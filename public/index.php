<?php
header('Content-type: text/html; charset=utf-8');
session_start();

require __DIR__ . DIRECTORY_SEPARATOR .'..'. DIRECTORY_SEPARATOR .'functions.php';
require __DIR__ . DIRECTORY_SEPARATOR .'..'. DIRECTORY_SEPARATOR .'/bootstrap.php';
require __DIR__ . DIRECTORY_SEPARATOR .'..'. DIRECTORY_SEPARATOR .'/autoload.php';


$rout = new App\Router($_SERVER['REQUEST_URI']);
//$rout->ctrlClass - controller name
$ctrl = new $rout->ctrlClass();
//$rout->actionMethodName - action name
$ctrl->action($rout->actionMethodName);