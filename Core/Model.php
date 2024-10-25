<?php 

namespace Core;

class Model
{
    protected $fields_array;
    protected static $primary_key = 'id';
    protected static $table_name = '';
    public function __construct()
    {
        $this->fields_array = [];
    }
    public function __set($name, $value)
    {
        $this->fields_array[$name] = $value;
    }
    public function __get($name)
    {
        return $this->fields_array[$name];
    }
    public static function delete_by_id($id)
    {
        Core::get()->db->delete(static::$table_name, [static::$primary_key => $id]);
    }
    public static function delete_by_condition($condition_accos_array)
    {
        Core::get()->db->delete(static::$table_name, $condition_accos_array);
    }
    public static function find_all()
    {
        $arr = Core::get()->db->select(static::$table_name, '*');
        if (count($arr) > 0) {
            return $arr;
        } else {
            return null;
        }
    }
    public static function find_by_id($id)
    {
        $arr = Core::get()->db->select(static::$table_name, '*', [static::$primary_key => $id]);
        if (count($arr) > 0) {
            return $arr[0];
        } else {
            return null;
        }
    }
    public static function find_by_condition($condition_accos_array)
    {
        $arr = Core::get()->db->select(static::$table_name, '*', $condition_accos_array);
        if (count($arr) > 0) {
            return $arr;
        } else {
            return null;
        }
    }
    public function save()
    {
        $is_insert = false;
        if ($this->{static::$primary_key} === null) {
            $is_insert = true;
        } else {
            $value = $this->{static::$primary_key};
            if (empty($value)) {
                $is_insert = true;
            }
        }
        if ($is_insert) {
            Core::get()->db->insert(static::$table_name, $this->fields_array);
        } else {
            Core::get()->db->update(
                static::$table_name,
                $this->fields_array,
                [
                    static::$primary_key => $this->{static::$primary_key}
                ]
            );
        }
    }
}