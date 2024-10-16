<?php

use Core\Router;

function autoload($class_name)
{
    $path = str_replace('\\', '/', $class_name . '.php');
    if (file_exists($path))
        include_once($path);
}
spl_autoload_register("autoload");
if (isset($_GET['route'])) {
    $route = $_GET['route'];
} else {
    $route = '';
}
$router = new core\Router($route);
$router->run();
