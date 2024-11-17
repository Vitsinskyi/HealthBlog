<?php

namespace Controllers;

use Core\Controller;
use Models\Posts;
use Models\Comments;
use Models\Users;
use Core\Core;

class PostsController extends Controller
{
    public function action_index(): array
    {
        return $this->render();
    }

    public function action_view($params): array
    {
        $id = intval($params[0]);
        $this->template->set_param('id', $id);

        if ($this->is_post) {
            $current_user = Core::get()->session->get('user');
            $text = $this->post->text;

            if (empty($text)) {
                $this->add_error_message('Введіть текст коментаря');
            }

            if (!$this->is_error_message_exist()) {
                Comments::add_comment(
                    $text,
                    intval($this->post->post_id),
                    $current_user->firstname,
                    $current_user->lastname,
                    date('Y-m-d H:i:s')
                );

                return $this->redirect('/posts/view/' . $id);
            }
        }

        return $this->render();
    }

    public function action_add($params): array
    {
        if (!Users::is_admin() && !Users::is_publisher()) {
            return $this->redirect('/category/index');
        }

        if (!empty($params[0])) {
            $category_id = intval($params[0]);
        } else {
            $category_id = null;
        }
        $this->template->set_param('category_id', $category_id);



        if ($this->is_post) {

            $maxSize = 8 * 1024 * 1024;
            $file = $_FILES['file'];

            $user = Core::get()->session->get('user');
            $user_id = $user->id;

            if (strlen($this->post->title) === 0) {
                $this->add_error_message('Введіть заголовок посту');
            }
            if (strlen($this->post->post_text) === 0) {
                $this->add_error_message('Введіть текст посту');
            }
            if (!$this->post->category_id === null) {
                $this->add_error_message('Виберіть категорію');
            }
            if (!$this->post->visibility === null) {
                $this->add_error_message('Виберіть видимість посту');
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
                Posts::add_post(
                    $this->post->title,
                    $this->post->post_text,
                    date('Y-m-d H:i:s'),
                    intval($this->post->visibility),
                    $_FILES['file']['tmp_name'],
                    $user_id,
                    intval($this->post->category_id),
                    $this->post->short_text
                );

                return $this->redirect('/posts/index');
            }
        }

        return $this->render();
    }

    public function action_edit($id)
    {
        $id = intval($id[0]);
        $this->template->set_param('id', $id);

        if (!Users::is_admin() && !Users::is_publisher()) {
            return $this->redirect('/category/index');
        }
        if (!Posts::find_post_by_id($id)) {
            return $this->redirect('/posts/index');
        }

        if ($this->is_post) {
            $maxSize = 8 * 1024 * 1024;
            $file = $_FILES['file'];

            $user = Core::get()->session->get('user');
            $user_id = $user->id;

            if (strlen($this->post->title) === 0) {
                $this->add_error_message('Введіть заголовок посту');
            }
            if (strlen($this->post->post_text) === 0) {
                $this->add_error_message('Введіть текст посту');
            }
            if (!$this->post->category_id === null) {
                $this->add_error_message('Виберіть категорію');
            }
            if (!$this->post->visibility === null) {
                $this->add_error_message('Виберіть видимість посту');
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
                Posts::update_post(
                    $id,
                    $this->post->title,
                    $this->post->post_text,
                    date('Y-m-d H:i:s'),
                    intval($this->post->visibility),
                    intval($this->post->category_id),
                    $user_id,
                    $this->post->short_text,
                    $file_tmp_name
                );

                return $this->redirect('/posts/index');
            }
        }

        return $this->render();
    }

    public function action_delete($params)
    {
        $id = intval($params[0]);
        if (!empty($params[1])) {
            $yes = $params[1] == 'yes';
        } else {
            $yes = false;
        }
        $this->template->set_param('id', $id);

        $post = Posts::find_post_by_id($id);

        if (!Users::is_admin() && !Users::is_publisher()) {
            return $this->redirect('/posts/index');
        }
        if (!Posts::find_post_by_id($id)) {
            return $this->redirect('/posts/index');
        }

        if ($this->is_post) {
            Posts::delete_posts($id);
            return $this->redirect('/posts/index');
        }

        if ($yes) {
            $photo_path = 'Uploads/Posts/' . $post->photo;
            if (is_file($photo_path)) {
                unlink($photo_path);
            }
            Posts::delete_posts($id);

            return $this->redirect('/posts/index');
        }

        return $this->render();
    }
}
