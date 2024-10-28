<?php

/** @var string $error_massage Повідомлення про помилку */
$this->title = "Створення категорії";
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
            <input type="text" class="form-control" id="inputName" name="name" placeholder="Назва" required>
        </div>
        <div class="mb-3">
            <label for="inputDescription" class="form-label">Опис категорії (не обовязково)</label>
            <textarea class="form-control" id="inputDescription" name="description" rows="3" placeholder="Опис"></textarea>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Оберіть файл для категорії</label>
            <input class="form-control" type="file" name="file" id="formFile" accept="image/jpeg" required>
            <small id="fileHelp" class="form-text text-muted">Максимальний розмір файлу: 8MB</small>
        </div>
        <div class="d-flex justify-content-center"><button type="submit" class="btn btn-primary px-3 mx-3">Створити</button></div>
    </form>
</div>