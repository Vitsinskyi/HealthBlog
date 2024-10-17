<?php

namespace Core;

class Controller
{
    protected Template $template;
    public function __construct()
    {
        $action = Core::get()->action_name;
        $module = Core::get()->module_name;
        $path = "Views/$module/$action.php";
        $this->template = new Template($path);
    }
    public function render()
    {
        return [
            'content' => $this->template->get_html(),
        ];
    }
}
