<?php

namespace Core;

class Error
{
    public $code;
    public $message;
    public function __construct($code, $message)
    {
        $this->code = $code;
        $this->message = $message;
    }
}
