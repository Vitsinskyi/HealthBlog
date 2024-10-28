<?php

namespace Controllers;

use Core\Controller;
use Models\Category;
use Models\Users;

class CategoryController extends Controller
{
    public function action_index(): array
    {
        return $this->render();
    }
    public function action_view($params): array
    {
        return $this->render();
    }
    public function action_add(): array
    {
        if (!Users::is_admin()) {
            return $this->redirect('/category/index');
        }
        if ($this->is_post) {
            $maxSize = 8 * 1024 * 1024;
            $file = $_FILES['file'];
            if (strlen($this->post->name) === 0) {
                $this->add_error_message('Введіть назву');
            }
            if ($file['size'] > $maxSize) {
                $this->add_error_message('Файл перевищує максимальний розмір у 8MB');
            }
            if ($file['error'] !== UPLOAD_ERR_OK) {
                $this->add_error_message('Виникла помилка при завантаженні файлу');
            }
            if ($file['type'] !== 'image/jpeg') {
                $this->add_error_message('Файл повинен бути зображенням у форматі jpeg');
            }

            if (!$this->is_error_message_exist()) {
                Category::add_category(
                    $this->post->name,
                    $_FILES['file']['tmp_name'],
                    $this->post->description
                );
                return $this->redirect('/category/index');
            }
        }
        return $this->render();
    }
}
