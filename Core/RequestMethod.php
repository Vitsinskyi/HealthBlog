<?php

namespace Core;

class RequestMethod
{
    public $array;
    public function __construct($array)
    {
        $this->array = $array;
    }
    public function __get($name)
    {
        if (isset($this->array[$name])) {
            return $this->array[$name];
        }
        return null;
    }
    public function get_all()
    {
        return $this->array;
    }
}
