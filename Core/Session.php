<?php

namespace Core;

class Session
{
    public function set($name, $value): void
    {
        $_SESSION[$name] = $value;
    }
    public function remove($name): void
    {
        unset($_SESSION[$name]);
    }
    public function set_values($assoc_array): void
    {
        foreach ($assoc_array as $key => $value) {
            $this->set($key, $value);
        }
    }
    public function get($name)
    {
        if (empty($_SESSION[$name])) {
            return null;
        }
        return $_SESSION[$name];
    }
}
