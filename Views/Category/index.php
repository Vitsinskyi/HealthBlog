<?php
$this->title = 'Категорії постів';

use Models\Category;
use Models\Users;

if (empty(Category::find_all_categories())) {
    $categories = [];
} else {
    $categories = Category::find_all_categories();
}
$path = 'Uploads\\Category\\';
?>

<div class="container">
    <div class="row justify-content-center">
        <?php if (empty($categories)) : ?>
            <h1>Категорій поки немає</h1>
        <?php elseif ($categories > 0) : ?>
            <?php foreach ($categories as $category) : ?>
                <div class="col-6 col-md-5 col-lg-4 col-xl-3 mb-4">
                    <div class="card h-100">

                        <a href="/category/view/<?= $category->id ?>">
                            <?php $file_path = 'Uploads/Category/' . $category->photo; ?>
                            <?php if (is_file($file_path)) : ?>
                                <img src="/<?= $file_path ?>" class="card-img-top" alt="Category_Photo" height="255" width="auto">
                            <?php else : ?>
                                <img src="/Uploads/Category/default.jpeg" class="card-img-top" alt="Category_Photo" height="255" width="auto">
                            <?php endif; ?>
                        </a>

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?= $category->name ?></h5>
                            <?php if ($category->description != null) : ?>
                                <p class="card-text"><?= $category->description ?></p>
                            <?php else : ?>
                                <p>&nbsp;</p>
                            <?php endif; ?>
                            <a href="/category/view/<?= $category->id ?>" class="btn btn-secondary mt-auto">Перейти до категорії</a>
                            <?php if (Users::is_admin()) : ?>
                                <div class="row justify-content-center">
                                    <a href="/category/edit/<?= $category->id ?>" class="card-link mx-0 ">Редагувати категорію</a>
                                    <a href="/category/delete/<?= $category->id ?>" class="card-link link-danger mx-0 ">Видалити категорію</a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        <div class="row justify-content-center">
            <?php if (Users::is_admin()) : ?>
                <a href="/category/add" class="btn btn-secondary mb-3">Додати категорію</a>
            <?php endif; ?>
        </div>
    </div>
</div>