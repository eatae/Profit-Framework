<?php
namespace App;

require __DIR__ . '/../autoload.php';

use Psr\Log;

class MyLogger implements Log\LoggerInterface
{

    public function emergency($message, array $context = array())
    {
        return strtoupper(Log\LogLevel::EMERGENCY) . '! No value.';
    }


    public function alert($message, array $context = array())
    {
        if (is_writable(__DIR__ . '/../log.txt')) {
            file_put_contents(__DIR__ . '/../log.txt', $message. "\n", FILE_APPEND);
        }
    }


    public function critical($message, array $context = array())
    {
        if (is_writable(__DIR__ . '/../log.txt')) {
            file_put_contents(__DIR__ . '/../log.txt', $message. "\n", FILE_APPEND);
        }
    }


    public function error($message, array $context = array())
    {
        return strtoupper(Log\LogLevel::ERROR) . '! No value.';
    }


    public function warning($message, array $context = array())
    {
        return strtoupper(Log\LogLevel::WARNING) . '! No value.';
    }


    public function notice($message, array $context = array())
    {
        return strtoupper(Log\LogLevel::NOTICE) . '! No value.';
    }


    public function info($message, array $context = array())
    {
        return strtoupper(Log\LogLevel::INFO) . '! No value.';
    }


    public function debug($message, array $context= [])
    {
        return strtoupper(Log\LogLevel::DEBUG) . '! No value.';
    }

    public function log($level, $message, array $context = [])
    {
        $this->$level($message, $context);
    }
}
