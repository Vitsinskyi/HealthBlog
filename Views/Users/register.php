<?php

/** @var string $error_massage Повідомлення про помилку */
$this->title = "Реєстрація користувача";
?>
<form method="post" action="">
    <?php if (!empty($error_massage)) : ?>
        <div class="alert alert-danger" role="alert">
            <?= $error_massage ?>
        </div>
    <?php endif ?>
    <div class="mb-3">
        <label for="inputEmail" class="form-label">Login / Email address</label>
        <input value="<?= $this->controller->post->login ?>" name="login" type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="inputPassword1" class="form-label">Password</label>
        <input name="password" type="password" class="form-control" id="inputPassword1">
    </div>
    <div class="mb-3">
        <label for="inputPassword2" class="form-label">Confirm Password</label>
        <input name="password2" type="password" class="form-control" id="inputPassword2">
    </div>
    <div class="mb-3">
        <label for="inputLastname" class="form-label">Surname</label>
        <input value="<?= $this->controller->post->lastname ?>" name="lastname" type="text" class="form-control" id="inputLastname">
    </div>
    <div class="mb-3">
        <label for="inputFirstname" class="form-label">Name</label>
        <input value="<?= $this->controller->post->firstname ?>" name="firstname" type="text" class="form-control" id="inputFirstname">
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
</form>