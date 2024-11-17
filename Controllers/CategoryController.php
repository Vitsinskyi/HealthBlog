<?php

namespace Controllers;

use Core\Controller;
use Models\Category;
use Models\Posts;
use Models\Users;

class CategoryController extends Controller
{
    public function action_index(): array
    {
        return $this->render();
    }

    public function action_view($params): ?array
    {
        $id = intval($params[0]);
        $this->template->set_param('id', $id);

        if (empty(Category::find_category_by_id($id))) {
            return $this->redirect('/category/index');
        }


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

    public function action_edit($id): ?array
    {
        $id = intval($id[0]);
        $this->template->set_param('id', $id);

        if (!Users::is_admin()) {
            return $this->redirect('/category/index');
        }
        if (!Category::find_category_by_id($id)) {
            return $this->redirect('/category/index');
        }

        if ($this->is_post) {
            $maxSize = 8 * 1024 * 1024;
            $file = $_FILES['file'];

            if (strlen($this->post->name) === 0) {
                $this->add_error_message('Введіть назву');
            }
            if (!$file['size'] == 0) {
                if ($file['size'] > $maxSize) {
                    $this->add_error_message('Файл перевищує максимальний розмір у 8MB');
                }
                if ($file['error'] !== UPLOAD_ERR_OK) {
                    $this->add_error_message('Виникла помилка при завантаженні файлу');
                }
                if ($file['type'] !== 'image/jpeg') {
                    $this->add_error_message('Файл повинен бути зображенням у форматі jpeg');
                }

                $file_tmp_name = $_FILES['file']['tmp_name'];
            } else {
                $file_tmp_name = null;
            }

            if (!$this->is_error_message_exist()) {
                Category::update_category(
                    $id,
                    $this->post->name,
                    $this->post->description,
                    $file_tmp_name
                );

                return $this->redirect('/category/index');
            }
        }

        return $this->render();
    }

    public function action_delete($params): ?array
    {
        $id = intval($params[0]);
        if (!empty($params[1])) {
            $yes = $params[1] == 'yes';
        } else {
            $yes = false;
        }
        $this->template->set_param('id', $id);

        $category = Category::find_category_by_id($id);

        if (!Users::is_admin()) {
            return $this->redirect('/category/index');
        }
        if (!Category::find_category_by_id($id)) {
            return $this->redirect('/category/index');
        }

        if ($yes) {
            $photo_path = 'Uploads/Category/' . $category->photo;
            if (is_file($photo_path)) {
                unlink($photo_path);
            }
            Category::delete_category($id);

            return $this->redirect('/category/index');
        }

        return $this->render();
    }
}
