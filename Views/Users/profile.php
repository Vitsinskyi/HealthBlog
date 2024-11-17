<?php
$this->title = 'Профіль користувача';

use Core\Core;

$current_user = Core::get()->session->get('user');

?>

<div class="container">
    <form method="post" action="">
        <?php if (!empty($error_message)) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $error_message ?>
            </div>
        <?php endif ?>
        <div class="mb-3">
            <label for="inputEmail" class="form-label">Пошта</label>
            <input value="<?= $current_user->login ?>" name="login" type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="inputPassword1" class="form-label">Новий пароль</label>
            <input name="password" type="password" class="form-control" id="inputPassword1">
        </div>
        <div class="mb-3">
            <label for="inputPassword2" class="form-label">Підтвердіть новий пароль</label>
            <input name="password2" type="password" class="form-control" id="inputPassword2">
        </div>
        <div class="mb-3">
            <label for="inputLastname" class="form-label">Прізвище</label>
            <input value="<?= $current_user->lastname ?>" name="lastname" type="text" class="form-control" id="inputLastname">
        </div>
        <div class="mb-5">
            <label for="inputFirstname" class="form-label">Ім'я</label>
            <input value="<?= $current_user->firstname ?>" name="firstname" type="text" class="form-control" id="inputFirstname">
        </div>
        <div class="d-flex justify-content-center"><button type="submit" class="btn btn-secondary px-3 mx-3">Підтвердити</button></div>
        <div class="d-flex justify-content-center m-4 mb-0"> <a class="link-underline-primary" href="/">Повернутись на головну</a></div>
    </form>
</div>