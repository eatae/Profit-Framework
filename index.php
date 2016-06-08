<?
header('Content-type: text/html; charset=utf-8');
require __DIR__ . '/autoload.php';
session_start();

$url = $_SERVER['REQUEST_URI'];

$parts = explode('/', $url);

$ctrl = $parts[1] ?: 'Index';
$action = $parts[2] ?: 'action';

$ctrlClass = '\App\Controllers\\' . ucfirst($ctrl);

$actionMethodName = 'action' . ucfirst($action);

if(!checkDir($ctrlClass)){
    $ctrlClass = '\App\Controllers\Index';
}

function checkDir($dir){
    $dir = trim($dir, '\\');
    $dir = str_replace('\\', '/', $dir);
    if(!is_readable(__DIR__ . '/' . $dir . '.php')) {
        return false;
    }
    return true;
}

$ctrl = new $ctrlClass();
$ctrl->action($actionMethodName);