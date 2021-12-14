<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'autoload.php';

//dump($_ENV);

//dump();

$keys =  implode(', ',array_keys(['first_name' => 'John', 'last_name' => 'Connor']));

(new \tests\DbTest())->getDataSet();