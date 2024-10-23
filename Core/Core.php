<?php

namespace Core;

class Core
{
    public $defaullt_layout_path = 'views/layouts/index.php';
    public $module_name;
    public $action_name;
    public $router;
    public $template;
    private static $instance;
    private function __construct()
    {
        $this->template = new Template($this->defaullt_layout_path);
    }
    public function run($route)
    {
        $this->router = new Router($route);
        $params = $this->router->run();
        $this->template->set_params($params);
    }
    public function done()
    {
        $this->template->display();
        $this->router->done();
    }

    public static function get()
    {
        if (empty(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}
