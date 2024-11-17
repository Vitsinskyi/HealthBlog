<?php

/** @var string $error_message Повідомлення про помилку */
$this->title = "Видалення категорії";

use Models\Category;

$category = Category::find_category_by_id($id);
?>
<div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Видалити категорію "<?= $category->name ?>"?</h4>
    <p>Після видалення категорї, її неможливо буде відновити</p>
    <hr>
    <p class="mb-0">
        <a href="/category/delete/<?= $category->id ?>/yes" class="btn btn-danger">Видалити</a>
        <a href="/category" class="btn btn-success">Відмінити</a>
    </p>
</div>