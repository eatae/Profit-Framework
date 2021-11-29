<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'autoload.php';

\Symfony\Component\VarDumper\VarDumper::dump($_ENV);
