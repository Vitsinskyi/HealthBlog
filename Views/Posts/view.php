<?php
$this->title = 'Сторінка посту';

/** @var string $error_message Повідомлення про помилку */

use Models\Posts;
use Models\Comments;
use Models\Users;

/** @var int $id */
$post = Posts::find_post_by_id($id);

$comments = Comments::find_comments_by_post_id($id);
if ($comments === null) {
    $comments = [];
}
?>
<style>
    a {
        color: #9d0a0e;
        text-decoration: none;
    }
</style>
<div class="container">
    <div class="row">
        <?php $file_path = 'Uploads/Posts/' . $post->photo ?>
        <?php if (is_file($file_path)) : ?>
            <img src="/<?= $file_path ?>" class="img-fluid" alt="Category_Photo" height="315" width="1024">
        <?php else : ?>
            <img src="/Uploads/Category/default.jpeg" class="" alt="Category_Photo" height="315" width="1024">
        <?php endif; ?>
    </div>
    <h1 class="h1 my-3 fw-bold"><?= $post->title ?></h1>
    <p class="fw-medium">Дата публікації: <?= $post->date ?></p>

    <div class="post-content">
        <?= $post->text ?>
    </div>

    <div class="border-bottom py-2 mt-5">
        <h2>Коментарі</h2>
        <?php if (count($comments) > 0) : ?>
            <?php foreach ($comments as $comment) : ?>
                <div class="border p-2">
                    <p><strong><?= $comment->author_lastname ?> <?= $comment->author_firstname ?></strong> коментує:</p>
                    <p><?= htmlspecialchars($comment->text) ?></p>
                    <p><em>Дата: <?= htmlspecialchars($comment->date) ?></em></p>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>Поки що коментарів немає.</p>
        <?php endif; ?>
    </div>
    <?php if (Users::is_user_logged()) : ?>
        <div class="add-comment mt-4">
            <h2>Додати коментар</h2>
            <?php if (!empty($error_message)) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= $error_message ?>
                </div>
            <?php endif ?>
            <form action="" method="post">
                <input type="hidden" name="post_id" value="<?= $post->id ?>">
                <div class="form-group mt-3">
                    <label for="text">Коментар</label>
                    <textarea class="form-control" id="text" name="text" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-secondary mt-3">Відправити</button>
            </form>
        </div>
    <?php else : ?>
        <p>Для того, щоб залишити коментар, <a href="/users/login">авторизуйтесь</a> або <a href="/users/register">зареєструйтесь</a>.</p>
    <?php endif; ?>
</div>

</div>