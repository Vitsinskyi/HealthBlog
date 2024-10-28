<?php

namespace Controllers;

use Core\Template;
use Core\Controller;
use Core\Core;
use Models\Posts;

class PostsController extends Controller
{
    public function action_add(): array
    {
        return $this->render();
    }

    public function action_index(): array
    {
        return $this->render();
    }

    public function action_view($params): array
    {
        return $this->render();
    }
}