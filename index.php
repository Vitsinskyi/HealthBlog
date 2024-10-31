<?php

use Core\Router;
use Core\Template;
use Core\Core;
use Core\Config;

date_default_timezone_set('Europe/Kiev');
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
$core = Core::get();
$core->run($route);
$core->done();
