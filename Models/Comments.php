<?php

namespace Models;

use Core\Model;

/**
 * @property int $id ID коментаря
 * @property string $text Комантар
 * @property int $post_id ID посту
 * @property string $date Дата публікації коменатаря
 * @property string $author_firstname Ім'я автора
 * @property string $author_lastname Прізвище автора
 */

class Comments extends Model
{
    public static $table_name = 'comments';

    public static function find_comments_by_post_id($post_id): ?array
    {
        $rows = self::find_by_condition(['post_id' => $post_id]);
        if (!empty($rows)) {
            foreach ($rows as $row) {
                $category[] = self::array_to_object($row, self::class);
            }
            return $category;
        } else {
            return null;
        }
    }

    public static function add_comment($text, $post_id, $author_firstname, $author_lastname, $date): void
    {
        $comment = new Comments();
        $comment->text = $text;
        $comment->post_id = $post_id;
        $comment->author_firstname = $author_firstname;
        $comment->author_lastname = $author_lastname;
        $comment->date = $date;
        $comment->save();
    }
}
