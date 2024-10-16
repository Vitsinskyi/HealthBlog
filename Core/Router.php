<?php

namespace Core;

class Router
{
    protected $route;
    public function __construct($route)
    {
        $this->route = $route;
    }
    public function run()
    {
        $parts = explode('/', $this->route);
        if (strlen($parts[0]) == 0) {
            $parts[0] = 'site';
            $parts[1] = 'index';
        }
        if (count($parts) == 1) {
            $parts[1] = 'index';
        }
        $controller = 'Controllers\\' . ucfirst($parts[0]) . 'Controller';
        $method = 'action_' . strtolower($parts[1]);
        if (class_exists($controller)) {
            $controllerObject = new $controller();
            if (method_exists($controller, $method)) {
                $controllerObject->$method();
            } else {
                $this->error(404);
            }
        } else {
            $this->error(404);
        }
    }
    public function error($code)
    {
        http_response_code($code);
        switch ($code) {
            case 404:
                echo 'Page not found';
        }
    }
}
