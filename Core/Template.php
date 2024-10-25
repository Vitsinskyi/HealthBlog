<?php

namespace Core;

class Template
{
    protected $template_file_path;
    protected $params_array;
    public Controller $controller;

    public function __set($name, $value)
    {
        Core::get()->template->set_param($name, $value);
    }

    public function __construct($template_file_path)
    {
        $this->template_file_path = $template_file_path;
        $this->params_array = [];
    }

    public function set_template_file_path($path)
    {
        $this->template_file_path = $path;
    }

    public function set_param($params_name, $params_value)
    {
        $this->params_array[$params_name] = $params_value;
    }

    public function set_params($params_array)
    {
        foreach ($params_array as $key => $value) {
            $this->set_param($key, $value);
        }
    }

    public function get_html()
    {
        ob_start();

        $this->controller = Core::get()->controller_object;
        extract($this->params_array);
        include($this->template_file_path);
        $str = ob_get_contents();
        ob_end_clean();
        return $str;
    }

    public function display()
    {
        echo $this->get_html();
    }
}
