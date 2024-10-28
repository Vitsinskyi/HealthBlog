<?php
$this->title = 'Категорії постів';

use Models\Category;
use Models\Users;

$categories = Category::find_all_categories();
$path = 'Uploads\\Category\\';
?>
<div class="container">
    <div class="row justify-content-center">
        <?php foreach ($categories as $category) : ?>
            <div class="col-6 col-md-5 col-lg-4 col-xl-3 mb-4">
                <div class="card h-100">
                    <img src="/Uploads/Category/<?= $category->photo ?>" class="card-img-top" alt="Category_Photo" height="255" width="auto">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?= $category->name ?></h5>
                        <?php if ($category->description != null) : ?>
                            <p class="card-text"><?= $category->description ?></p>
                        <?php else : ?>
                            <p>&nbsp;</p>
                        <?php endif; ?>
                        <a href="/category/view/<?= $category->id ?>" class="btn btn-primary mt-auto">Перейти до категорії</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="row justify-content-center">
            <?php if (Users::is_admin()) : ?>
                <a href="/category/add" class="btn btn-primary mb-3">Додати категорію</a>
            <?php endif; ?>
        </div>
    </div>
</div>