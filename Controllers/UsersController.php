<?php

namespace Controllers;

use Core\Controller;
use Models\Users;
use Core\Core;

class UsersController extends Controller
{
    public function action_index()
    {
        echo 'UsersController -> action_index()';
    }
    public function action_login()
    {
        if ($this->is_post) {
            $user = Users::verify_login_password($this->post->login, $this->post->password);
            if (!empty($user)) {
                Users::login_user($user);
                return $this->redirect('/');
            } else
                $error_massage = 'Невірний логін або пароль';
            $this->template->set_param('error_massage', $error_massage);
        }
        return $this->render();
    }
    public function action_logout()
    {
        Users::logout_user();
        return $this->redirect('/users/login');
    }
}
