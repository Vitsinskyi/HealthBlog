<?php

namespace Models;

use Core\Model;
use Core\Core;

/**
 * @property int $id ID користувача
 * @property string $login Логін користувача
 * @property string $password Пароль користувача
 * @property string $first_name Ім'я користувача
 * @property string $first_name Прізвище користувача
 * @property bit $is_admin Чи є користувач адміном
 * @property bit $is_publisher Чи є користувач видавцем
 */
class Users extends Model
{
    public static $table_name = 'users';
    public static function verify_login_password($login, $password)
    {
        $rows = self::find_by_condition(['login' => $login, 'password' => $password]);
        if (!empty($rows)) {
            return $rows[0];
        } else
            return null;
    }
    public static function is_user_logged()
    {
        return !empty(Core::get()->session->get('user'));
    }
    public static function login_user($user)
    {
        Core::get()->session->set('user', $user);
    }
    public static function logout_user()
    {
        Core::get()->session->remove('user');
    }
}
