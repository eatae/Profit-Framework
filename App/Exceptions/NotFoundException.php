<?php
namespace App\Exceptions;

class NotFoundException
    extends \Exception
{
    function __toString()
    {
        return '<table><tr><td><strong>Ошибка 404 - не найдено' .
            $this->getCode() . '</strong>: ' . $this->getMessage() .
            '<br>' . ' в файле:  ' . $this->getFile() . ' строка:  ' .
            $this->getLine() . '</td></tr></table><br>';
    }
}