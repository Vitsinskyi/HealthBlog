<?php

namespace Controllers;

use Core\Template;
use Core\Controller;

class SiteController extends Controller
{
    public function action_index()
    {
        return $this->render();
    }
    public function action_error($code)
    {
        echo 'Error ' . $code;
    }
}