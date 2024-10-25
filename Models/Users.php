<?php

namespace Models;

use Core\Model;
use Core\Core;

/**
 * @property int $id ID користувача
 * @property string $login Логін користувача
 * @property string $password Пароль користувача
 * @property string $firstname Ім'я користувача
 * @property string $firstname Прізвище користувача
 * @property boolean $is_admin Чи є користувач адміном
 * @property boolean $is_publisher Чи є користувач видавцем
 */
class Users extends Model
{
    public static $table_name = 'users';
    public static function find_by_login_password($login, $password)
    {
        $rows = self::find_by_condition(['login' => $login, 'password' => $password]);
        if (!empty($rows)) {
            return self::array_to_object($rows[0], self::class);
        } else {
            return null;
        }
    }
    public static function find_by_login($login)
    {
        $rows = self::find_by_condition(['login' => $login]);
        if (!empty($rows)) {
            return self::array_to_object($rows[0], self::class);
        } else {
            return null;
        }
    }
    public static function find_all_users()
    {
        $rows = self::find_all();
        $users = [];
        foreach ($rows as $row) {
            $users[] = self::array_to_object($row, self::class);
        }
        return $users;
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
    public static function register_user($login, $password, $firstname, $lastname)
    {
        $user = new Users();
        $user->login = $login;
        $user->password = $password;
        $user->firstname = $firstname;
        $user->lastname = $lastname;
        $user->is_admin = false;
        $user->is_publisher = false;
        $user->save();
    }
    public static function update_user_permision($id, $admin, $publisher)
    {

        $user_id = $id;
        $is_admin = isset($admin) ? 1 : 0;
        $is_publisher = isset($publisher) ? 1 : 0;
        $user = self::array_to_object(Users::find_by_id($user_id), self::class);
        if ($user) {
            $user->is_admin = $is_admin;
            $user->is_publisher = $is_publisher;
            $user->save();
        } else {
            echo "Користувача з ID $user_id не знайдено.";
        }
    }
    public static function is_admin()
    {
        $user = Core::get()->session->get('user');
        if (is_array($user)) {
            $user = self::array_to_object($user, self::class);
        }
        if ($user instanceof Users && $user->is_admin == 1) {
            return true;
        } else {
            return false;
        }
    }
    private static function array_to_object(array $array, string $className)
    {
        $object = new $className();
        foreach ($array as $key => $value) {
            $object->$key = $value;
        }
        return $object;
    }
}
