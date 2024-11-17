<?php

/** 
 * @var string $error_message Повідомлення про помилку
 * */

use Models\Category;
use Models\Posts;

$post = Posts::find_post_by_id($id);
$categories = Category::find_all_categories();
$this->title = "Редагування посту";
?>
<div class="container">
    <form method="post" action="" enctype="multipart/form-data">
        <div class="form-text text-info text-end">* Обов'язкові поля</div>
        <?php if (!empty($error_message)) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $error_message ?>
            </div>
        <?php endif ?>
        <div class="mb-3">
            <label for="title" class="form-label">Заголовок посту *</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Заголовок" value="<?= $post->title ?>" required>
        </div>
        <div class="input-group mb-3">
            <label for="category_id" class="input-group-text">Оберіть категорію посту</label>
            <select class="form-select" id="category_id" name="category_id" required>
                <?php foreach ($categories as $category) : ?>
                    <option <?php if ($category->id == $post->category_id) echo 'selected'; ?> value="<?= $category->id ?>"><?= $category->name ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="short_text" class="form-label">Короткий текст посту</label>
            <textarea class="form-control" id="short_text" name="short_text" rows="3" placeholder="Короткий текст"><?= $post->short_text ?></textarea>
        </div>
        <div class="mb-3">
            <label for="post_text" class="form-label">Текст посту *</label>
            <textarea class="editor editor" id="post_text" name="post_text" rows="3" placeholder="Текст"><?= $post->text ?></textarea>
        </div>
        <div class="mb-3 border d-flex justify-content-center">
            <div>
                <?php $file_path = 'Uploads/Posts/' . $post->photo; ?>
                <?php if (is_file($file_path)) : ?>
                    <img src="/<?= $file_path ?>" class="image-thumbnail card-img-top" alt="Category_Photo" height="255" width="auto">
                <?php else : ?>
                    <img src="/Uploads/Category/default.jpeg" class="image-thumbnail card-img-top" alt="Category_Photo" height="255" width="auto">
                <?php endif; ?>
            </div>
        </div>
        <div class="mb-3">
            <label for="file" class="form-label">Оберіть фото для посту (замінити фото)</label>
            <input class="form-control" type="file" name="file" id="file" accept="image/jpeg">
            <small id="fileHelp" class="form-text text-muted">Максимальний розмір файлу: 8MB</small>
        </div>
        <div class="input-group mb-3">
            <label for="visibility" class="input-group-text">Видимість посту</label>
            <select class="form-select" id="visibility" name="visibility" required>
                <option value="1">Так</option>
                <option value="0">Ні</option>
            </select>
        </div>
        <div class="d-flex justify-content-center"><button type="submit" class="btn btn-secondary px-3 mx-3">Редагувати</button></div>
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