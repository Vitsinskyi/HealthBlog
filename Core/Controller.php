<?php

namespace Core;

class Controller
{
    protected Template $template;
    protected $error_messages;
    public $is_post = false;
    public $is_get = false;
    public $post;
    public $get;
    public function __construct()
    {
        $action = Core::get()->action_name;
        $module = Core::get()->module_name;
        $path = "Views/$module/$action.php";
        $this->template = new Template($path);
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'POST':
                $this->is_post = true;
                break;
            case 'GET':
                $this->is_get = true;
                break;
        }
        $this->post = new Post();
        $this->get = new Get();
        $this->error_messages = [];
    }
    public function render($path_to_view = null)
    {
        if (!empty($path_to_view)) {
            $this->template->set_template_file_path($path_to_view);
        }
        return [
            'content' => $this->template->get_html(),
        ];
    }
    public function redirect($path)
    {
        header("Location: $path");
        die;
    }
    public function add_error_message($message = null)
    {
        $this->error_messages[] = $message;
        $this->template->set_param('error_message', implode('<br/>', $this->error_messages));
    }
    public function clear_error_message()
    {
        $this->$this->error_messages = [];
        $this->template->set_param('error_message', null);
    }
    public function is_error_message_exist()
    {
        return count($this->error_messages) > 0;
    }
}
