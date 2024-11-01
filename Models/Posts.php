<?php

namespace Models;

use Core\Model;

/**
 * @property int $id ID посту
 * @property string $title Заголовок посту
 * @property string $text Текст посту
 * @property string $short_text Короткий опис посту
 * @property string $date Дата публікації посту
 * @property boolean $visibility Видимість посту
 * @property int $author_id Автор посту
 * @property int $category_id Тема посту
 */
class Posts extends Model
{
    public static $table_name = 'posts';
    public static function find_post_by_id($id)
    {
        $rows = self::find_by_id($id);
        if (!empty($rows)) {
            return self::array_to_object($rows, self::class);
        } else {
            return null;
        }
    }
    public static function find_all_posts()
    {
        $rows = self::find_all();
        if (!empty($rows)) {
            foreach ($rows as $row) {
                $category[] = self::array_to_object($row, self::class);
            }
            return $category;
            return null;
        }
    }
    public static function add_post($title, $text, $date, $visibility, $author_id, $category_id, $short_text = null)
    {
        $posts = new Posts();
        $posts->title = $title;
        $posts->text = $text;
        $posts->date = $date;
        $posts->visibility = $visibility;
        $posts->author_id = $author_id;
        $posts->category_id = $category_id;
        $posts->short_text = $short_text;
        $posts->save();
    }
    public static function delete_posts($id)
    {
        self::delete_by_id($id);
    }
    public static function update_post($id, $title, $text, $short_text, $date, $visibility, $author_id, $category_id)
    {
        $post = self::find_by_id($id);
        $post->title = $title;
        $post->text = $text;
        $post->short_text = $short_text;
        $post->date = $date;
        $post->visibility = $visibility;
        $post->author_id = $author_id;
        $post->category_id = $category_id;
        $post->save();
    }
    public static function find_posts_by_category($category_id)
    {
        $rows = self::find_by_condition(['category_id' => $category_id]);
        if (!empty($rows)) {
            foreach ($rows as $row) {
                $category[] = self::array_to_object($row, self::class);
            }
            return $category;
        } else {
            return null;
        }
    }
}
