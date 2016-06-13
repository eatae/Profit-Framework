<?php
require __DIR__ . '/../../autoload.php';


$config = App\config\Config::getInstance();
echo $config->data['db']['host'];