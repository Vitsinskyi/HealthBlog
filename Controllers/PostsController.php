<?php

namespace Controllers;

namespace Controllers;

use Core\Template;
use Core\Controller;

class PostController extends Controller
{
    public function action_add()
    {
        /*$this -> template -> set_template_file_path('views/post/add.php');
        return [
            'content' => $this -> template -> get_html(),
            'title' => 'Додавання посту до блогу'
        ];*/
        return $this->render();
    }

    public function action_index()
    {
        /*return [
            'content' => $this -> template -> get_html(),
            'title' => 'Список постів'
        ];*/
        return $this->render();
    }

    public function action_view($params)
    {
        /*return [
            'content' => 'view Action',
            'title' => 'Перегляд поста'
        ];*/
        return $this->render();
    }
}