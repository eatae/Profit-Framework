<?php

namespace App\Exceptions;


use App\MyLogger;

abstract class AbstractLogException extends \Exception
{
    function __construct($message = NULL, $code = 0)
    {
        parent::__construct($message, $code);
        $this->time = date('j M Y, H:i:s');
    }

    protected static $levelLog;
    protected $time;
    protected $logStr = '';

    final function getLogStr()
    {
        $this->logStr .= $this->time . ' FILE:' . $this->file . ' LINE:';
        $this->logStr .= $this->line . ' CLASS:' . __CLASS__ . ' ';
        $this->logStr .= $this->message . ' ' .  strtoupper(static::$levelLog);
        return $this->logStr;
    }


    final public function getLogLevel()
    {
        return static::$levelLog;
    }

    final public function setLog()
    {
        $logger = new MyLogger();
        $logger->log($this->getLogLevel(), $this->getLogStr());
    }
}