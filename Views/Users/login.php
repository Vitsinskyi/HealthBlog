<?php

/** @var string $error_massage Повідомлення про помилку */
$this->title = "Вхід на сайт";
?>
<div class="container">
    <form method="post" action="">
        <?php if (!empty($error_massage)) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $error_massage ?>
            </div>
        <?php endif ?>
        <div class="mb-3">
            <label for="inputEmail" class="form-label">Login / Email address</label>
            <input name="login" type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp">
        </div>
        <div class="mb-5">
            <label for="inputPassword" class="form-label">Password</label>
            <input name="password" type="password" class="form-control" id="inputPassword">
        </div>
        <div class="d-flex justify-content-center"><button type="submit" class="btn btn-primary px-3 mx-3">Submit</button></div>
        <div class="d-flex justify-content-center m-4 mb-0">Don`t have an account?</div>
        <div class="d-flex justify-content-center"> <a class="link-underline-primary" href="/users/register">Register</a></div>
    </form>
</div>