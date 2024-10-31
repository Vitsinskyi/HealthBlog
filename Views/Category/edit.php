<?php

/** @var string $error_massage Повідомлення про помилку */
$this->title = "Редагування категорії";

use Models\Category;

$category = Category::find_category_by_id($id);
?>
<div class="container">
    <form method="post" action="" enctype="multipart/form-data">
        <?php if (!empty($error_massage)) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $error_massage ?>
            </div>
        <?php endif ?>
        <div class="mb-3">
            <label for="inputName" class="form-label">Назава категорії</label>
            <input type="text" class="form-control" id="inputName" name="name" value="<?= $category->name ?>" placeholder="Назва" required>
        </div>
        <div class="mb-3">
            <label for="inputDescription" class="form-label">Опис категорії (не обовязково)</label>
            <textarea class="form-control" id="inputDescription" name="description" rows="3" placeholder="Опис"><?= $category->description ?></textarea>
        </div>
        <div class="mb-3 border d-flex justify-content-center">
            <div>
                <?php $file_path = 'Uploads/Category/' . $category->photo; ?>
                <?php if (is_file($file_path)) : ?>
                    <img src="/<?= $file_path ?>" class="image-thumbnail card-img-top" alt="Category_Photo" height="255" width="auto">
                <?php else : ?>
                    <img src="/Uploads/Category/default.jpg" class="image-thumbnail card-img-top" alt="Category_Photo" height="255" width="auto">
                <?php endif; ?>
            </div>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Оберіть файл для категорії (замінити фото)</label>
            <input class="form-control" type="file" name="file" id="formFile" accept="image/jpeg">
            <small id="fileHelp" class="form-text text-muted">Максимальний розмір файлу: 8MB</small>
        </div>
        <div class="d-flex justify-content-center"><button type="submit" class="btn btn-primary px-3 mx-3">Зберегти</button></div>
    </form>
</div>