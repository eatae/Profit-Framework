<?php
namespace App\Exceptions;

require __DIR__ . '/../../autoload.php';

use Psr\Log;

class NotFoundException extends AbstractLogException
{
    protected static $levelLog = Log\LogLevel::CRITICAL;
}
