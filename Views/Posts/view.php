<?php
$this->title = 'Сторінка посту';

use Models\Posts;

$post = Posts::find_post_by_id($id);
?>
<style>
    a {
        color: #9d0a0e;
        text-decoration: none;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-12"></div>


        <?php $file_path = 'Uploads/Category/' ?>
        <?php if (is_file($file_path)) : ?>
            <img src="/<?= $file_path ?>" class="img-thumbnail" alt="Category_Photo" height="315" width="1024">
        <?php else : ?>
            <img src="/Uploads/Category/default.jpg" class="" alt="Category_Photo" height="315" width="1024">
        <?php endif; ?>
    </div>
    <h1 class="h1 mb-3"><?= $post->title ?></h1>
    <p class="fw-medium">Дата публікації: <?= $post->date ?></p>
    <div class="post-content">
        <?= $post->text ?>
    </div>

    <div class="post-content">

    </div>

</div>