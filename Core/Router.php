<?php

namespace Core;

use Controllers\SiteController;

class Router
{
    protected $route;
    protected $index_template;

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

        Core::get()->module_name = $parts[0];
        Core::get()->action_name = $parts[1];

        $controller = 'Controllers\\' . ucfirst($parts[0]) . 'Controller';
        $method = 'action_' . strtolower($parts[1]);

        if (class_exists($controller)) {
            $controller_object = new $controller();
            Core::get()->controller_object = $controller_object;
            if (method_exists($controller, $method)) {
                array_splice($parts, 0, 2);
                return $controller_object->$method($parts);
            } else {
                $site_controller = new SiteController;
                $site_controller->action_error(404);
                return null;
            }
        } else {
            $site_controller = new SiteController;
            $site_controller->action_error(404);
            return null;
        }
    }
    public function done()
    {
        //$this -> index_template -> dispaly();
    }
}
