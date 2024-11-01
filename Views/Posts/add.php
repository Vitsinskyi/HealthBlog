<?php

/** 
 * @var string $error_massage Повідомлення про помилку 
 * @var int/null $category_id ID категорії
 * */

use Models\Category;


$categories = Category::find_all_categories();
$this->title = "Додавання посту до блогу";
?>
<style>
    .ck-powered-by {
        display: none;
    }
</style>
<div class="container">
    <form method="post" action="" enctype="multipart/form-data">
        <div class="form-text text-info text-end">* Обов'язкові поля</div>
        <?php if (!empty($error_massage)) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $error_massage ?>
            </div>
        <?php endif ?>
        <div class="mb-3">
            <label for="title" class="form-label">Заголовок посту *</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Заголовок" required>
        </div>
        <div class="input-group mb-3">
            <label for="category_id" class="input-group-text">Оберіть категорію посту</label>
            <select class="form-select" id="category_id" name="category_id" placeholder="Категорія" required>
                <?php foreach ($categories as $category) : ?>
                    <option <?php if ($category->id == $category_id) echo 'selected'; ?> value="<?= $category->id ?>"><?= $category->name ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="short_text" class="form-label">Короткий текст посту</label>
            <textarea class="form-control" id="short_text" name="short_text" rows="3" placeholder="Короткий текст"></textarea>
        </div>
        <div class="mb-3">
            <label for="text" class="form-label">Текст посту *</label>
            <textarea class=editor form-control" id="text" name="text" rows="3" placeholder="Текст" required></textarea>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Оберіть фото для посту</label>
            <input multiple class="form-control" type="file" name="file" id="formFile" accept="image/jpeg">
            <small id="fileHelp" class="form-text text-muted">Максимальний розмір файлу: 8MB</small>
        </div>
        <div class="input-group mb-3">
            <label for="visibility" class="input-group-text">Видимість посту</label>
            <select class="form-select" id="visibility" name="visibility" placeholder="Категорія" required>
                <option value="1">Так</option>
                <option value="0">Ні</option>
            </select>
        </div>
        <div class="d-flex justify-content-center"><button type="submit" class="btn btn-primary px-3 mx-3">Створити</button></div>
    </form>
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('.editor'))
        .catch(error => {
            console.error(error);
        });
</script>