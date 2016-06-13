<?
header('Content-type: text/html; charset=utf-8');
require __DIR__ . '/autoload.php';
session_start();

$rout = new App\Router($_SERVER['REQUEST_URI']);
//$rout->ctrlClass - controller name
$ctrl = new $rout->ctrlClass();
//$rout->actionMethodName - action name
$ctrl->action($rout->actionMethodName);