<?php

/** @var string $error_message Повідомлення про помилку */
$this->title = "Вхід на сайт";
?>
<div class="container">
    <form method="post" action="">
        <?php if (!empty($error_message)) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $error_message ?>
            </div>
        <?php endif ?>
        <div class="mb-3">
            <label for="inputEmail" class="form-label">Електронна пошта</label>
            <input name="login" type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp">
        </div>
        <div class="mb-5">
            <label for="inputPassword" class="form-label">Пароль</label>
            <input name="password" type="password" class="form-control" id="inputPassword">
        </div>
        <div class="d-flex justify-content-center"><button type="submit" class="btn btn-secondary px-3 mx-3">Увійти</button></div>
        <div class="d-flex justify-content-center m-4 mb-0">Не маєте аккаунат?</div>
        <div class="d-flex justify-content-center"> <a class="link-underline-primary" href="/users/register">Зареєструватися</a></div>
    </form>
</div>