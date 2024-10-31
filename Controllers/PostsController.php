<?php

namespace Controllers;

use Core\Controller;
use Models\Posts;
use Models\Category;
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
        return $this->render();
    }
    public function action_add(): array
    {
        if (!Users::is_admin()) {
            return $this->redirect('/category/index');
        }
        if (!Users::is_publisher()) {
            return $this->redirect('/category/index');
        }
        $categories = Category::find_all_categories();
        $this->template->set_param('categories', $categories);
        $user = Core::get()->session->get('user');
        $user_id = $user->id;
        if ($this->is_post) {

            if (strlen($this->post->title) === 0) {
                $this->add_error_message('Введіть заголовок посту');
            }
            if (strlen($this->post->title) === 0) {
                $this->add_error_message('Введіть текст посту');
            }
            if (empty($this->post->category_id)) {
                $this->add_error_message('Виберіть категорію');
            }
            if (empty($this->post->visibility)) {
                $this->add_error_message('Виберіть видимість посту');
            }

            if (!$this->is_error_massage_exist()) {
                Posts::add_post(
                    $this->post->title,
                    $this->post->text,
                    date('Y-m-d H:i:s'),
                    intval($this->post->visibility),
                    $user_id,
                    intval($this->post->category_id),
                    $this->post->short_text
                );

                return $this->redirect('/posts/index');
            }
        }
        return $this->render();
    }
}
