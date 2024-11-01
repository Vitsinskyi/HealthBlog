<?php
$this->title = "Перегляд постів за категорією";

use Models\Category;
use Models\Posts;
use Models\Users;

$category = Category::find_category_by_id($id);
$posts = Posts::find_posts_by_category($id);
?>
<div class="container">
    <div class="row justify-content-center">
        <?php foreach ($posts as $poster) : ?>
            <div class="col-6 col-md-5 col-lg-4 col-xl-3 mb-4">
                <div class="card h-100">

                    <a href="/posts/view/<?= $poster->id ?>">
                        <img src="/Uploads/Category/default.jpeg" class="card-img-top" alt="Category_Photo" height="255" width="auto">
                    </a>

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?= $poster->title ?></h5>
                        <?php if ($poster->short_text != null) : ?>
                            <p class="card-text"><?= $poster->short_text ?></p>
                        <?php else : ?>
                            <p>&nbsp;</p>
                        <?php endif; ?>
                        <a href="/posts/view/<?= $poster->id ?>" class="btn btn-primary mt-auto">Перейти до посту</a>
                        <?php if (Users::is_admin()) : ?>
                            <div class="row justify-content-center">
                                <a href="/posts/edit/<?= $poster->id ?>" class="card-link mx-0 ">Редагувати пост</a>
                                <a href="/posts/delete/<?= $poster->id ?>" class="card-link link-danger mx-0 ">Видалити пост</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="row justify-content-center">
            <?php if (Users::is_admin()) : ?>
                <a href="/posts/add/<?= $id ?>" class="btn btn-primary mb-3">Додати пост у категорію</a>
            <?php endif; ?>
        </div>
    </div>
</div>