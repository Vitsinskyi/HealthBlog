<?php

namespace Controllers;

use Core\Controller;

class SiteController extends Controller
{
    public function action_index(): array
    {
        return $this->render();
    }

    public function action_error($code): array
    {
        switch ($code) {
            case 404:
                $this->redirect('/views/site/error404.php');
                return $this->render('/views/site/error404.php');
            case 403:
                $this->redirect('/views/site/error403.php');
                return $this->render('/views/site/error403.php');
            default:
                return $this->render('/views/site/error404.php');
        }
    }
}
