<?php

namespace tests;

$arr = ['first', 'second'];
$string = implode(' || ', $arr);

if(is_writable('log.txt'))
    file_put_contents('log.txt', $string . "\n", FILE_APPEND);