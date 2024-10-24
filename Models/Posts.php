<?php

namespace Models;

use Core\Model;

/**
 * @property int $id ID посту
 * @property string $title Заголовок посту
 * @property string $text Текст посту
 * @property string $short_text Короткий опис посту
 * @property string $date Дата публікації посту
 * @property string $author Автор посту
 * @property string $visibility Видимість посту
 * @property string $topic Тема посту
 */
class Posts extends Model
{
    public static $table_name = 'posts';
}
