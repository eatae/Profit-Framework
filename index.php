<?
header('Content-type: text/html; charset=utf-8');
require __DIR__ . '/autoload.php';


$url = $_SERVER['REQUEST_URI'];


$parts = explode('/', $url);

$ctrl = $parts[1] ?: 'Index';
$action = $parts[2] ?: 'Default';


$ctrlClass = '\App\Controllers\\' . ucfirst($ctrl);
$actionMethodName = 'action' . ucfirst($action);

if(!class_exists($ctrlClass, true))
    $ctrlClass = '\App\Controllers\Index';

$ctrl = new $ctrlClass;
$ctrl->action($actionMethodName);