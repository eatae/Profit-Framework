<?php
namespace App\Traits;

trait DataCountable
{
    protected $data = [];

    public function count()
    {
        return count($this->data);
    }

    public function __set($key, $val)
    {
        $this->data[$key] = $val;
    }

    public function __isset($key)
    {
        return isset($this->data[$key]);
    }

    public function __get($key)
    {
        return $this->data[$key] ?: null;
    }
}