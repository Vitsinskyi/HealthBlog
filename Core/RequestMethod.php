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
        return $this->array[$name];
    }
    public function get_all()
    {
        return $this->array;
    }
}
