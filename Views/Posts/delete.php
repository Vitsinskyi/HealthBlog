<?php

/** @var string $error_message Повідомлення про помилку */
$this->title = "Видалення посту";

use Models\Posts;

$post = Posts::find_post_by_id($id);
?>
<div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Видалити пост "<?= $post->title ?>"?</h4>
    <p>Після видалення посту, його неможливо буде відновити</p>
    <hr>
    <p class="mb-0">
        <a href="/posts/delete/<?= $post->id ?>/yes" class="btn btn-danger">Видалити</a>
        <a href="/posts" class="btn btn-success">Відмінити</a>
    </p>
</div>